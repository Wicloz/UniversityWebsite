<?php
class Navigation {
    private static function isActive ($get, $url) {
        $active = true;
        $pairsMust = explode('&', substr($url, strpos($url, '?') + 1));
        $pairsHas = array();
        foreach ($get as $key => $value) {
            $pairsHas[] = $key.'='.str_replace('_item', '', $value);
        }

        foreach ($pairsMust as $pair) {
            if (!in_array($pair, $pairsHas)) {
                $active = false;
            }
        }

        return $active;
    }

    private static function parseSubjectNav ($row) {
        $subjects = Queries::subjects();

        foreach ($subjects as $subject) {
            $sub_names[] = $subject->name;
            $sub_urls[] = '?page=subjects&subject='.$subject->abbreviation;
        }
        if (!isset($sub_names) || !isset($sub_urls)) {
            $sub_names[] = 'No Subjects';
            $sub_urls[] = '?page=subjects&subject=none';
        }

        $row->sub_names = implode(', ', $sub_names);
        $row->sub_urls = implode(', ', $sub_urls);
        $row->url = '';
        return $row;
    }

    public static function topnav ($get) {
        $navin = DB::instance()->get("navigation");
        $navout = array();

        foreach ($navin->results() as $row) {
            if ($row->url == '%SUBJECTS%') {
                $row = self::parseSubjectNav($row);
            }

            $subNames = explode(',', str_replace(', ', ',', $row->sub_names));
            $subUrls = explode(',', str_replace(', ', ',', $row->sub_urls));
            $active = self::isActive($get, $row->url);

            $subItems = array();
            foreach ($subNames as $index => $subName) {
                $activeSub = self::isActive($get, $subUrls[$index]);
                if ($activeSub) {
                    $active = true;
                }
                if (empty($row->url)) {
                    $subItems[] = array(
                        "title" => $subName,
                        "location" => $subUrls[$index],
                        "active" => $activeSub
                    );
                }
            }

            $navout[] = array(
                "title" => $row->name,
                "location" => $row->url,
                "target" => $row->target,
                "active" => $active,
                "subItems" => $subItems
            );
        }

        return $navout;
    }

    public static function sidenav ($get) {
        $navin = DB::instance()->get("navigation");
        $navout = array();

        foreach ($navin->results() as $row) {
            if ($row->url == '%SUBJECTS%') {
                $row = self::parseSubjectNav($row);
            }

            if (!empty($row->sub_names)) {
                $subNames = explode(',', str_replace(', ', ',', $row->sub_names));
                $subUrls = explode(',', str_replace(', ', ',', $row->sub_urls));
                $active = false;

                $subItems = array();
                foreach ($subNames as $index => $subName) {
                    $activeSub = self::isActive($get, $subUrls[$index]);
                    if ($activeSub) {
                        $active = true;
                    }
                    $subItems[] = array(
                        "title" => $subName,
                        "location" => $subUrls[$index],
                        "active" => $activeSub
                    );
                }

                if ($active) {
                    $navout[] = array(
                        "header" => $row->header,
                        "content" => $subItems
                    );
                }
            }
        }

        return $navout;
    }
}
?>
