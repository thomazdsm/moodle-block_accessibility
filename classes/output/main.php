<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * Class containing data for accessibility block.
 *
 * @package    block_accessibility
 * @copyright  2023 Thomaz Machado <thomazdsmachado@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_accessibility\output;

defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;

/**
 * Class containing data for Recently accessed items block.
 *
 * @package    block_accessibility
 * @copyright  2023 Thomaz Machado <thomazdsmachado@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class main implements renderable, templatable {
    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param \renderer_base $output
     *
     * @return \stdClass
     *
     * @throws \dml_exception
     * @throws \Exception
     */
    public function export_for_template(renderer_base $output) {
        global $DB, $USER, $CFG;

        try {
            $userid = $USER->id;

            $data = new \stdClass();
            $data->title = "Hello World!";

            return $data;
        } catch (\Exception $exception) {
            if ($CFG->debug == DEBUG_DEVELOPER) {
                throw $exception;
            }

            return new \external_warnings(
                get_class($exception),
                $exception->getCode(),
                $exception->getMessage()
            );
        }
    }
}