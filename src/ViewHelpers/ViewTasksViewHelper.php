<?php

namespace App\ViewHelpers;

class ViewTasksViewHelper
{
    public static function displayTasks(array $tasks): string
    {
        $result = '<ul>';
        if (empty($tasks)) {
            $result = self::handleNoTasks();
        } else {
            foreach ($tasks as $task) {
                $result .=
                    '<li>' . $task->getContent() . '</li>';
            }
        }
        $result .= '</ul>';
        return $result;
    }

    private static function handleNoTasks(): string
    {
        return '<p>No tasks found.</p>';
    }
}