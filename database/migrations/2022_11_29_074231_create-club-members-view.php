<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->dropView());
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }

    private function createView(): string
    {
        return <<<SQL
            create view `clubmemberoverview` as
            select
                `users`.`id` as `id`,
                `users`.`firstname` as `firstname`,
                `users`.`lastname` as `lastname`,
                `users`.`email` as `email`,
                `profiles`.`birthdate` as `birthdate`,
                `profiles`.`streetandnumber` as `streetandnumber`,
                `profiles`.`zipcode` as `zipcode`,
                `profiles`.`city` as `city`,
                `profiles`.`phone` as `phone`,
                `departments`.`name` as `departmentname`,
                `seasons`.`year` as `year`,
                `club_memberships`.`status` as `membershipstatus`
            from
                ((((`users`
            join `profiles` on
                (`users`.`id` = `profiles`.`club_member_id`))
            join `club_memberships` on
                (`users`.`id` = `club_memberships`.`club_member_id`))
            join `departments` on
                (`club_memberships`.`department_id` = `departments`.`id`))
            join `seasons` on
                (`club_memberships`.`season_id` = `seasons`.`id`));

            SQL;
    }

    private function dropView(): string
    {
        return <<<SQL
            DROP VIEW IF EXISTS `clubmemberoverview`;
            SQL;
    }
};
