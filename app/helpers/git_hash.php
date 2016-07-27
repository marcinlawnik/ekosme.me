<?php

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class GitHashHelper {
    public static function currentDeployedHash() {
        $process = new Process('git log -1 --pretty=format:%h');
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $output = $process->getOutput();
        echo $output;
    }
}