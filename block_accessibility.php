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
 * Contains block_accessibility
 * @package    block_accessibility
 * @copyright  2023 Thomaz Machado <thomazdsmachado@gmail.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 */

defined('MOODLE_INTERNAL') || die();

/**
 * A block responsible for adding accessibility features to the environment.
 *
 * @package    block_accessibility
 * @copyright  2023 Thomaz Machado <thomazdsmachado@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 */

class block_accessibility extends block_base {

    function init() {
        $this->title = get_string('pluginname', 'block_accessibility');
    }

    /**
     * Returns the contents.
     *
     * @return stdClass contents of block
     */
    public function get_content() {
        global $USER;

        if (isset($this->content)) {
            return $this->content;
        }

//        if (is_siteadmin($USER->id)) {
//            return;
//        }

        $renderable = new block_accessibility\output\main();
        $renderer = $this->page->get_renderer('block_accessibility');

        $this->content = new stdClass();
        $this->content->text = $renderer->render($renderable);

        $this->page->requires->js_call_amd('block_accessibility/vlibras-plugin.js');
        $this->page->requires->js_call_amd('block_accessibility/app.js');

        return $this->content;
    }

    /**
     * Which page types this block may appear on.
     *
     * The information returned here is processed by the
     * {@link blocks_name_allowed_in_format()} function. Look there if you need
     * to know exactly how this works.
     *
     * Default case: everything except mod and tag.
     *
     * @return array page-type prefix => true/false.
     */
    function applicable_formats() {
        // Default case: the block can be used in courses and site index, but not in activities
        return array('my' => true);
    }

}