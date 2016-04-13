<?php
class UserTables {
    private static function dropTables () {
        if (Users::loggedIn()) {
            $sid = Users::safeSid();
            DB::instance()->query("DROP TABLE `{$sid}_assignments`, `{$sid}_exams`, `{$sid}_planning`");
        }
    }

    private static function assignmentsTable ($sid) {
        return "
            CREATE TABLE IF NOT EXISTS `{$sid}_assignments` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `start_date` date NOT NULL,
              `end_date` date NOT NULL,
              `end_time` time NOT NULL,
              `subject` varchar(8) NOT NULL,
              `desc_short` varchar(100) NOT NULL,
              `desc_full` text NOT NULL,
              `link_assignment` varchar(300) NOT NULL,
              `link_repository` varchar(300) NOT NULL,
              `link_report` varchar(300) NOT NULL,
              `team` varchar(100) NOT NULL,
              `completion` tinyint(1) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
        ";
    }

    private static function examsTable ($sid) {
        return "
            CREATE TABLE IF NOT EXISTS `{$sid}_exams` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `date` date NOT NULL,
              `weight` varchar(20) NOT NULL,
              `subject` varchar(8) NOT NULL,
              `substance` text NOT NULL,
              `link` varchar(300) NOT NULL,
              `mark` float NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
        ";
    }

    private static function planningTable ($sid) {
        return "
            CREATE TABLE IF NOT EXISTS `{$sid}_planning` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `parent_table` varchar(20) NOT NULL,
              `parent_id` int(11) NOT NULL,
              `date_start` date NOT NULL,
              `date_end` date NOT NULL,
              `duration` time NOT NULL,
              `goal` varchar(200) NOT NULL,
              `finished_on` datetime NOT NULL,
              `completion` tinyint(1) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
        ";
    }

    private static function assignmentsMigrations ($sid) {

    }

    private static function examsMigrations ($sid) {

    }

    private static function planningMigrations ($sid) {

    }

    private static function updateVersions () {
        Users::currentUser()->update(array('table_versions' => '{"assignments": 1, "exams": 1, "planning": 1}'));
    }

    public static function tableVersion ($table) {
        if (Users::loggedIn() && Users::currentData()->table_versions !== '') {
            $versions = (array) json_decode(Users::currentData()->table_versions);
            return $versions[$table];
        }
        return 0;
    }

    public static function hasTables () {
        return self::tableVersion('assignments') != 0 && self::tableVersion('exams') != 0 && self::tableVersion('planning') != 0;
    }

    public static function createTables () {
        if (Users::loggedIn() && !self::hasTables()) {
            self::dropTables();
            DB::instance()->query(self::assignmentsTable(Users::safeSid()));
            DB::instance()->query(self::examsTable(Users::safeSid()));
            DB::instance()->query(self::planningTable(Users::safeSid()));
            self::updateVersions();
        }
    }

    public static function updateTables () {
        if (Users::loggedIn() && self::hasTables()) {
            self::updateVersions();
        }
    }
}
?>
