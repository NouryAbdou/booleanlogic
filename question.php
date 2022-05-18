<?php
// This file is part of Moodle - https://moodle.org/
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
 * The main question class, defining its functionalities.
 */

defined('MOODLE_INTERNAL') || die();

class qtype_booleanlogic_question  extends question_graded_by_strategy
implements question_response_answer_comparer {

     /** @var boolean whether answers should be graded case-sensitively. */
     public $usecase;
     /** @var array of question_answer. */
     public $answers = array();

     public function __construct() {
        parent::__construct(new question_first_matching_answer_grading_strategy($this));
    }

    

    /**
     * {@inheritDoc}
     * @see question_definition::get_expected_data()
     */
    public function get_expected_data() {
        return array('answer' => PARAM_RAW);
    }

    /**
     * {@inheritDoc}
     * @see question_definition::get_correct_response()
     */
    public function get_correct_response() {
        return array('answer' => '');
    }

    /**
     * Wrapper to get the answer in a response object, handling unset variable.
     * @param array $response the response object
     * @return string the answer
     */
    private function get_answer(array $response) {
        return isset($response['answer']) ? $response['answer'] : '';
    }

    public function summarise_response(array $response) {
        return isset($response['answer']) ? $response['answer'] : '';
    }

    public function is_complete_response(array $response) {
        return isset($response['answer']) && $response['answer'] > '';
    }

    public function get_validation_error(array $response) {
        return '';
    }

    public function is_same_response(array $prevresponse, array $newresponse) {
        return question_utils::arrays_same_at_key_missing_is_blank($prevresponse, $newresponse, 'answer');
    }

    public function grade_response(array $response) {
        $grade = 0;
        return array($grade, question_state::graded_state_for_fraction($grade));
    }
}
