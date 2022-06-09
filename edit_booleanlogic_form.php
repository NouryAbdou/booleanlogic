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
 * Defines the editing form.
 */

defined('MOODLE_INTERNAL') || die();

class qtype_booleanlogic_edit_form extends question_edit_form {

    /**
     * Question type name.
     * @see question_edit_form::qtype()
     */
    public function qtype() {
        return 'booleanlogic';
    }

    /**
     * Add our fields to the form.
     * @param MoodleQuickForm $mform The form being built.
     * @see question_edit_form::definition_inner()
     */
    protected function definition_inner($mform) {
        $mform->addElement('textarea', 'teachercorrection', 'Correction pour la question'); // On ajoute un champ texte pour la correction, qui s'appelle bien "teachercorrection"
        $mform->addElement('static', 'symbols', 'logicalsymbols', '∧  ∨  ¬  ⇒  ∀  ∃  ⊥  ⇔');

    }

    public function validation($submitteddata, $files) {
        $errors = parent::validation($submitteddata, $files);

        return $errors;
    }
}
