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
 * Contains class block_accessibility\output\block_renderer_html
 *
 * @package    block_accessibility
 * @copyright  2023 Thomaz Machado <thomazdsmachado@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_accessibility\output;

defined('MOODLE_INTERNAL') || die();

/**
 * Renderer for RSS Client block
 *
 * @package    block_accessibility
 * @copyright  2023 Thomaz Machado <thomazdsmachado@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class renderer extends \plugin_renderer_base {
    /**
     * Return the main content for the Accessibility Block.
     *
     * @param \renderer_base $main The main renderable
     *
     * @return string HTML string
     *
     * @throws \moodle_exception
     */
    public function render_recently_course(\renderer_base $main) {
        return $this->render_from_template('block_recommended_courses/main', $main->export_for_template($this));
    }
}
