<?php
class Tables {
    public static function assignments ($history) {
        $results = Queries::assignments($history);
        $now_pos = 0;

        foreach ($results as $index => $entry) {
            if (strtotime($entry->end_date.' '.$entry->end_time) < strtotime('now')) {
                $now_pos = $index + 1;
            }
            $entry->start_date = DateFormat::dateTable($entry->start_date);
            $entry->end_date = DateFormat::dateTable($entry->end_date);
            $entry->end_time = DateFormat::timeDefault($entry->end_time);
        }

        $today = new stdClass();
        $today->todayRow = true;
        $today->id = 'today';
        $today->completion = false;
        $today->end_date = '<b>'.DateFormat::dateTable();
        $today->end_time = DateFormat::timeDefault().'</b>';
        $today->subject_name = '</a><b>Today is a gift</b><a href="">';
        $today->desc_short = '</a><b>Thats why it\'s called the present</b><a href="">';
        $today->team = '';
        $today->state = '<b>-</b>';
        array_splice($results, $now_pos, 0, array($today));

        return $results;
    }

    public static function exams ($history) {
        $results = Queries::exams($history);
        $now_pos = 0;

        foreach ($results as $index => $entry) {
            if (strtotime($entry->date) < strtotime('today')) {
                $now_pos = $index + 1;
            }
            $entry->date = DateFormat::dateTable($entry->date);
        }

        $today = new stdClass();
        $today->todayRow = true;
        $today->id = 'today';
        $today->completion = false;
        $today->date = '<b>'.DateFormat::dateTable().'</b>';
        $today->weight = '</a><b>Today is a gift</b><a href="">';
        $today->subject_name = '</a><b>Thats why it\'s called the present</b><a href="">';
        $today->mark = '<b>-</b>';
        array_splice($results, $now_pos, 0, array($today));

        return $results;
    }

    public static function planning ($history, $parent_table = null, $parent_id = null) {
        $results = Queries::planning($history, $parent_table, $parent_id);
        $now_pos = 0;

        foreach ($results as $index => $entry) {
            if (strtotime($entry->date_end) < strtotime('today')) {
                $now_pos = $index + 1;
            }
            $entry->date_start = DateFormat::dateTable($entry->date_start);
            $entry->date_end = DateFormat::dateTable($entry->date_end);
            $entry->duration = DateFormat::timeDuration($entry->duration);
        }

        $today = new stdClass();
        $today->todayRow = true;
        $today->id = 'today';
        $today->completion = false;
        $today->date_start = '<b>'.DateFormat::dateTable().'</b>';
        $today->date_end = '<b>'.DateFormat::dateTable().'</b>';
        $today->subject_name = '</a><b>Today is a gift</b><a href="">';
        $today->duration = '<b>-</b>';
        $today->goal = '<b>Thats why it\'s called the present</b>';
        $today->state = '<b>-</b>';
        array_splice($results, $now_pos, 0, array($today));

        return $results;
    }

    public static function events ($history, $subject = null) {
        $results = Queries::events($history, $subject);
        $now_pos = 0;

        foreach ($results as $index => $entry) {
            if ($entry->type === 'assignment' && strtotime($entry->date) < strtotime('now')) {
                $now_pos = $index + 1;
            } elseif (strtotime($entry->date) < strtotime('today')) {
                $now_pos = $index + 1;
            }
            if ($entry->type === 'assignment') {
                $entry->date = DateFormat::dateTimeTable($entry->date);
            } elseif ($entry->type === 'exam') {
                $entry->date = DateFormat::dateTable($entry->date);
            } elseif ($entry->type === 'planning') {
                $entry->date = DateFormat::dateTable($entry->date);
            }
        }

        $today = new stdClass();
        $today->todayRow = true;
        $today->id = 'today';
        $today->completion = false;
        $today->date = '<b>'.DateFormat::dateTimeTable().'</b>';
        $today->type = '<b>-</b>';
        $today->subject_name = '</a><b>Today is a gift</b><a href="">';
        $today->task = '<b>Thats why it\'s called the present</b>';
        $today->state = '<b>-</b>';
        array_splice($results, $now_pos, 0, array($today));

        return $results;
    }

    public static function today () {
        $results = Queries::today();
        return $results;
    }
}
?>
