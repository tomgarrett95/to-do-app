<?php

namespace App\ViewHelpers;

use App\Entities\Task;

class EditTaskViewHelper
{
    public static function displayTask(Task $task): string
    {
        $output = '<p>' . $task->getContent() . '</p>';
        $output .= '<p>' . $task->getTimestamp() . '<p>';
        $output .= '<form>
                    <label for="complete">Done?</label>
                    <input type="checkbox" name="complete" id="complete">
                    <label for="delete">Delete forever?</label>
                    <input type="checkbox" name="delete" id="delete">
                    <button type="submit">Submit</button>
                    </form>';
        return $output;
    }
}