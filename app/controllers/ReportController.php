<?php

use CpChart\Factory\Factory;

class ReportController extends \BaseController
{
    public function getIndex()
    {
        $subscribers = Subscriber::whereActive(1)->get();

        return View::make('admin.reports.index')
            ->withYear(date('Y'))
            ->withSubscribers($subscribers);
    }

    public function getUser($subscriberId = '1', $type = 'full' )
    {


        // Get the necessary data

        $subscriber = Subscriber::where('id', '=', $subscriberId)->first();

        // 2014-2015 whereNotIn('id', [1, 2, 9, 14] <=44
        // 2015-2016 >44

        if ($type === 'yearly'){

            $lastYear = date('Y')-1;
            $memes = Meme::whereDate('created_at', '>', $lastYear . '-08-20')
                ->whereDate('created_at', '<', date('Y') . '-07-15')
                ->whereNotIn('id', [1, 2, 9, 14])
                ->get();
        }
        else {
            // If the type is "full" or not set, then get all applicable memes
            $memes = Meme::whereNotIn('id', [1, 2, 9, 14])->get();
        }

        foreach ($memes as $meme) {
            // Check if user received meme -> not -> break "didnt receive meme"
            if ($meme->codes()->where('subscriber_id', '=', $subscriber->id)->count() === 0) {
                $stats[$meme->id] = [
                    'meme_text' => 'Nie otrzymałeś/aś tego mema.',
                ];
            }
            // Check if user voted on meme -> not -> break "didnt vote on meme"
            elseif ($meme->codes()->where('subscriber_id', '=', $subscriber->id)->whereNull('vote')->count() === 1) {
                $stats[$meme->id] = [
                    'meme_text' => 'Nie głosowałeś/aś przy tym memie.',
                ];
            }
            // Generate stats, including:
            // Pie chart: yes vote, no vote, didnt vote
            // Include how user voted
            else {
                $stats[$meme->id] = [
                    'meme_text' => 0,
                ];
            }
        }


        //for each meme:
        // Print meme
        // Check if user received meme -> not -> break "didnt receive meme"
        // Check if user voted on meme -> not -> break "didnt vote on meme"


        $view = View::make('reports.report')
            ->with('type', $type)
            ->with('memes', $memes)
            ->with('stats', $stats)
            ->with('subscriber', $subscriber)->render();

        return $view;
    }

    public function getChart($memeid, $subscriberId)
    {
        $subscriber = Subscriber::where('id', '=', $subscriberId)->first();

        $meme = Meme::where('id', '=', $memeid)->first();

        $stats = [
            'votes_for'       => $meme->codes()->where('vote', '=', '1')->count(),
            'votes_against'   => $meme->codes()->where('vote', '=', '0')->count(),
            'votes_no_vote'   => $meme->codes()->whereNull('vote')->count(),
            'like_percentage' => $meme->codes()->where('vote', '=', '1')->count() / $meme->codes()->whereNotNull('vote')->count(),
            'user_vote'       => $subscriber->codes()->where('meme_id', '=', $meme->id)->first()->vote,
        ];

        try {
            // create a factory class - it will load necessary files automatically,
            // otherwise you will need to add them on your own
            $factory = new Factory();

            // create and populate the pData class
            $memeData = $factory->newData([
                $stats['votes_for'],
                $stats['votes_against'],
                $stats['votes_no_vote'],
            ], 'Głosy');


            $memeData->addPoints([
                'Głosy "Spoko"',
                'Głosy "Suchar"',
                'Brak głosu',
            ], 'Opisy');

            $memeData->setAbscissa('Opisy');

            // create the image and set the data
            $myPicture = $factory->newImage(800, 450, $memeData);

            //Write title of meme

            $myPicture->setFontProperties(
                [
                    'FontName' => 'verdana.ttf',
                    'FontSize' => 20,
                ]
            );

            $myPicture->drawText(400, 50, 'Mem: '.$meme->name, [
                'R'     => 0,
                'G'     => 0,
                'B'     => 0,
                'Align' => TEXT_ALIGN_MIDDLEMIDDLE,
            ]);

            $myPicture->setFontProperties(
                [
                    'FontName' => 'Forgotte.ttf',
                    'FontSize' => 16,
                ]
            );

            //Draw border
            $myPicture->drawRectangle(0, 0, 799, 449, [
                'R' => 0,
                'G' => 0,
                'B' => 0,
            ]);


            // creating a pie chart - notice that you specify the type of chart, not class name.
            // not all charts need to be created through this method (ex. the bar chart),
            // some are created via the pImage class (check the documentation before drawing).
            $pieChart = $factory->newChart('pie', $myPicture, $memeData);

            $pieChart->draw3DPie(400, 220, [
                'Radius'        => 200,
                'DrawLabels'    => true,
                'DataGapAngle'  => 10,
                'DataGapRadius' => 6,
                'Border'        => true,
                'SecondPass'    => true,
                'LabelStacked'  => true,
                //Colors and opacity of legend
//                'LabelR' => 255,
//                'LabelG' => 0,
//                'LabelB' => 0,
//                'LabelAlpha' => 100,
                //Values
                'WriteValues'   => PIE_VALUE_NATURAL,
                'ValueSuffix'   => ' os.',
                'ValuePosition' => PIE_VALUE_INSIDE,
                'ValuePadding'  => 80,
                'ValueR'        => 0,
                'ValueG'        => 0,
                'ValueB'        => 255,
                'ValueAlpha'    => 100,

            ]);

            //Add a writing on how user voted

            $myPicture->setFontProperties(['FontName' => 'Forgotte.ttf', 'FontSize' => 24]);

            $myPicture->drawText(610, 380, 'Twój Głos: ', ['R' => 0, 'G' => 0, 'B' => 0, 'Align' => TEXT_ALIGN_MIDDLEMIDDLE]);

            $myPicture->setFontProperties(['FontName' => 'Forgotte.ttf', 'FontSize' => 50]);

            if ($stats['user_vote'] == 1) {
                $myPicture->drawText(700, 380, 'TAK', ['R' => 0, 'G' => 255, 'B' => 0, 'Align' => TEXT_ALIGN_MIDDLEMIDDLE]);
            } elseif ($stats['user_vote'] == 0) {
                $myPicture->drawText(700, 380, 'NIE', ['R' => 255, 'G' => 0, 'B' => 0, 'Align' => TEXT_ALIGN_MIDDLEMIDDLE]);
            }

            //Add info about approval percentage
            $myPicture->setFontProperties(['FontName' => 'Forgotte.ttf', 'FontSize' => 24]);

            $myPicture->drawText(400, 380, 'Procent "Spoko":  '.round($stats['like_percentage'] * 100, 2).'%', ['R' => 0, 'G' => 0, 'B' => 0, 'Align' => TEXT_ALIGN_MIDDLEMIDDLE]);

            //Add Gromowładny

            $myPicture->drawFromPNG(1, 270, storage_path().'/images/logo_mini.png');


            // do the drawing
            $myPicture->Stroke();
        } catch (\Exception $ex) {
            echo 'There was an error: '.$ex->getMessage();
        }
    }
}
