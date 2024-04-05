<?php

class phpgacl_api_test extends gacl_test_case
{
    /** VERSION **/

    public function get_version()
    {
        $result = $this->gacl_api->get_version();
        //$expected = '/^[0-9]{1,2}.[0-9]{1,2}.[0-9]{1,2}$/i';
        $expected = '/^[0-9]{1,2}.[0-9]{1,2}.[0-9]{1,2}[a-zA-Z]{0,1}[0-9]{0,1}$/i';

        $this->assertRegexp($expected, $result, 'Version incorrect.');
    }
    public function get_schema_version()
    {
        $result = $this->gacl_api->get_schema_version();
        $expected = '/^[0-9]{1,2}.[0-9]{1,2}$/i';

        $this->assertRegexp($expected, $result, 'Schema Version incorrect.');
    }

    /** GENERAL **/

    public function count_all()
    {
        //Create array
        $arr = array(
            'Level1a' => array(
                'Level2a' => array(
                    'Level3a' => 1,
                    'Level3b' => 2
                ),
                'Level2b' => 3,
            ),
            'Level1b' => 4,
            'Level1c' => array(
                'Level2c' => array(
                    'Level3c' => 5,
                    'Level3d' => 6
                ),
                'Level2d' => 7,
            ),
            'Level1d' => 8
        );

        //Keep in mind count_all only counts actual values. So array()'s don't count as +1
        $result = $this->gacl_api->count_all($arr);

        $this->assertEquals(8, $result, 'Incorrect array count, Should be 8.');
    }

    /** ACO SECTION **/

    public function get_object_section_section_id_aco()
    {
        $result = $this->gacl_api->get_object_section_section_id('unit_test', 'unit_test', 'ACO');
        $message = 'get_object_section_section_id failed';

        $this->assert($result, $message);

        return $result;
    }

    public function add_object_section_aco()
    {
        $result = $this->gacl_api->add_object_section('unit_test', 'unit_test', 999, 0, 'ACO');
        $message = 'add_object_section failed';

        $this->assert($result, $message);
    }

    public function del_object_section_aco()
    {
        $result = $this->gacl_api->del_object_section($this->get_object_section_section_id_aco(), 'ACO');
        $message = 'del_object_section failed';
        $this->assert($result, $message);
    }

    /** ACO **/

    public function get_object_id_aco()
    {
        $result = $this->gacl_api->get_object_id('unit_test', 'enable_tests', 'ACO');
        $message = 'get_object_id failed';
        $this->assert($result, $message);

        return $result;
    }

    public function add_object_aco()
    {
        $result = $this->gacl_api->add_object('unit_test', 'Enable - Tests', 'enable_tests', 999, 0, 'ACO');
        $message = 'add_object failed';
        $this->assert($result, $message);
    }

    public function del_object_aco()
    {
        $result = $this->gacl_api->del_object($this->get_object_id_aco(), 'ACO');
        $message = 'del_object failed';
        $this->assert($result, $message);
    }

    /** ARO SECTION **/

    public function get_object_section_section_id_aro()
    {
        $result = $this->gacl_api->get_object_section_section_id('unit_test', 'unit_test', 'ARO');
        $this->_aco_section_id = $result;
        $message = 'get_object_section_section_id failed';
        $this->assert($result >= 0, $message);

        return $result;
    }

    public function add_object_section_aro()
    {
        $result = $this->gacl_api->add_object_section('unit_test', 'unit_test', 999, 0, 'ARO');
        $message = 'add_object_section failed';
        $this->assert($result, $message);
    }

    public function edit_object_section_aro()
    {
        $object_id = $this->get_object_section_section_id_aro();

        $rename_result = $this->gacl_api->edit_object_section($object_id, 'unit_test_tmp', 'unit_test_tmp', 999, 0, 'ARO');
        $rename2_result = $this->gacl_api->edit_object_section($object_id, 'unit_test', 'unit_test', 999, 0, 'ARO');

        if ($rename_result === true and $rename2_result === true) {
            $result = true;
        } else {
            $result = false;
        }

        $message = 'edit_object_section failed';
        $this->assert($result, $message);
    }

    public function del_object_section_aro()
    {
        $result = $this->gacl_api->del_object_section($this->get_object_section_section_id_aro(), 'ARO');
        $message = 'del_object_section failed';
        $this->assert($result, $message);
    }

    /** ARO **/

    public function get_object_id_aro()
    {
        $result = $this->gacl_api->get_object_id('unit_test', 'john_doe', 'ARO');
        $message = 'get_object_id failed';
        $this->assert($result, $message);

        return $result;
    }

    public function get_object2_id_aro()
    {
        $result = $this->gacl_api->get_object_id('unit_test', 'jane_doe', 'ARO');
        $message = 'get_object2_id failed';
        $this->assert($result, $message);

        return $result;
    }

    public function add_object_aro()
    {
        $result = $this->gacl_api->add_object('unit_test', 'John Doe', 'john_doe', 999, 0, 'ARO');
        $message = 'add_object failed';
        $this->assert($result, $message);
    }
    public function del_object_aro()
    {
        $result = $this->gacl_api->del_object($this->get_object_id_aro(), 'ARO');
        $message = 'del_object failed';
        $this->assert($result, $message);
    }

    public function add_object2_aro()
    {
        $result = $this->gacl_api->add_object('unit_test', 'Jane Doe', 'jane_doe', 998, 0, 'ARO');
        $message = 'add_object2 failed';
        $this->assert($result, $message);
    }
    public function del_object2_aro()
    {
        $result = $this->gacl_api->del_object($this->get_object2_id_aro(), 'ARO');
        $message = 'del_object2 failed';
        $this->assert($result, $message);
    }

    /** AXO SECTION **/

    public function get_object_section_section_id_axo()
    {
        $result = $this->gacl_api->get_object_section_section_id('unit_test', 'unit_test', 'AXO');
        $message = 'get_object_section_section_id failed';
        $this->assert($result, $message);

        return $result;
    }

    public function add_object_section_axo()
    {
        $result = $this->gacl_api->add_object_section('unit_test', 'unit_test', 999, 0, 'AXO');
        $this->_aco_section_id = $result;
        $message = 'add_object_section failed';
        $this->assert($result, $message);
    }

    public function del_object_section_axo()
    {
        $result = $this->gacl_api->del_object_section($this->get_object_section_section_id_axo(), 'AXO');
        $message = 'del_object_section failed';
        $this->assert($result, $message);
    }

    /** AXO **/

    public function get_object_id_axo()
    {
        $result = $this->gacl_api->get_object_id('unit_test', 'object_1', 'AXO');
        $message = 'get_object_id failed';
        $this->assert($result, $message);

        return $result;
    }

    public function add_object_axo()
    {
        $result = $this->gacl_api->add_object('unit_test', 'Object 1', 'object_1', 999, 0, 'AXO');
        $message = 'add_object failed';
        $this->assert($result, $message);
    }

    public function del_object_axo()
    {
        $result = $this->gacl_api->del_object($this->get_object_id_axo(), 'AXO');
        $message = 'del_object failed';
        $this->assert($result, $message);
    }

    /** ARO GROUP **/

    public function get_group_id_parent_aro()
    {
        $result = $this->gacl_api->get_group_id(null, 'ARO Group 1', 'ARO');
        $message = 'get_group_id_parent_aro failed';
        $this->assert($result, $message);

        return $result;
    }

    public function get_group_id_child_aro()
    {
        $result = $this->gacl_api->get_group_id(null, 'ARO Group 2', 'ARO');
        $message = 'get_group_id_child_aro failed';
        $this->assert($result, $message);

        return $result;
    }

    public function get_group_parent_id_aro()
    {
        $parent_id = $this->gacl_api->get_group_parent_id($this->get_group_id_child_aro(), 'ARO');
        //Make sure it matches with the actual parent.
        if ($parent_id === $this->get_group_id_parent_aro()) {
            $result = true;
        } else {
            $result = false;
        }
        $message = 'get_group_parent_id_aro failed';
        $this->assert($result, $message);

        return $result;
    }

    public function get_group_data_aro()
    {
        list($id, $parent_id, $value, $name, $lft, $rgt) = $this->gacl_api->get_group_data($this->get_group_id_parent_aro(), 'ARO');
        //Check all values in the resulting array.
        if ($id > 0 and $parent_id >= 0 and strlen($name) > 0 and $lft >= 1 and $rgt > 1) {
            $result = true;
        } else {
            $result = false;
        }
        $message = 'get_group_data_aro failed';
        $this->assert($result, $message);

        return $result;
    }

    public function get_parent_group_objects_aro()
    {
        $group_objects = $this->gacl_api->get_group_objects($this->get_group_id_parent_aro(), 'ARO');
        if (count($group_objects, COUNT_RECURSIVE) == 2 and $group_objects['unit_test'][0] == 'john_doe') {
            $result = true;
        } else {
            $result = false;
        }
        $message = 'get_parent_group_objects_aro failed';
        $this->assert($result, $message);

        return $result;
    }

    public function get_parent_group_objects_recurse_aro()
    {
        $group_objects = $this->gacl_api->get_group_objects($this->get_group_id_parent_aro(), 'ARO', 'RECURSE');

        switch (true) {
            case count($group_objects) != 1:
            case !isset($group_objects['unit_test']):
            case count($group_objects['unit_test']) != 2:
            case !in_array('john_doe', $group_objects['unit_test']):
            case !in_array('jane_doe', $group_objects['unit_test']):
                $result = false;
                break;
            default:
                $result = true;
        }

        $message = 'get_parent_group_objects_recurse_aro failed';
        $this->assert($result, $message);

        return $result;
    }

    public function add_group_parent_aro()
    {
        $result = $this->gacl_api->add_group('group_1', 'ARO Group 1', 0, 'ARO');
        $message = 'add_group_parent_aro failed';
        $this->assert($result, $message);
    }

    public function edit_group_parent_aro()
    {
        $group_id = $this->get_group_id_parent_aro();

        $first_rename = $this->gacl_api->edit_group($group_id, 'group_1_tmp', 'ARO Group 1 - tmp', 0, 'ARO');
        $second_rename = $this->gacl_api->edit_group($group_id, 'group_1', 'ARO Group 1', 0, 'ARO');
        $reparent_to_self = $this->gacl_api->edit_group($group_id, 'group_1', 'ARO Group 1', $group_id, 'ARO');

        if ($first_rename === true and $second_rename === true and $reparent_to_self === false) {
            $result = true;
        } else {
            $result = false;
        }
        $message = 'edit_group_parent_aro failed';
        $this->assert($result, $message);
    }

    public function del_group_parent_reparent_aro()
    {
        $this->add_group_parent_aro();
        $this->add_group_child_aro();
        $this->add_parent_group_object_aro();
        $this->add_child_group_object_aro();

        $result = $this->gacl_api->del_group($this->get_group_id_parent_aro(), true, 'ARO');

        $this->del_child_group_object_aro();
        $this->del_group_child_aro();

        $message = 'del_group_parent_no_reparent_aro failed';
        $this->assert($result, $message);
    }

    public function del_group_parent_no_reparent_aro()
    {
        $this->add_group_parent_aro();
        $this->add_group_child_aro();
        $this->add_parent_group_object_aro();
        $this->add_child_group_object_aro();

        $result = $this->gacl_api->del_group($this->get_group_id_parent_aro(), false, 'ARO');

        $message = 'del_group_parent_reparent_aro failed';
        $this->assert($result, $message);
    }


    public function del_group_parent_aro()
    {
        $result = $this->gacl_api->del_group($this->get_group_id_parent_aro(), true, 'ARO');
        $message = 'del_group_parent_aro failed';
        $this->assert($result, $message);
    }

    public function add_group_child_aro()
    {
        $result = $this->gacl_api->add_group('group_2', 'ARO Group 2', $this->get_group_id_parent_aro(), 'ARO');
        $message = 'add_group_child failed';
        $this->assert($result, $message);
    }

    public function del_group_child_aro()
    {
        $result = $this->gacl_api->del_group($this->get_group_id_child_aro(), true, 'ARO');
        $message = 'del_group failed';
        $this->assert($result, $message);
    }

    public function add_parent_group_object_aro()
    {
        $result = $this->gacl_api->add_group_object($this->get_group_id_parent_aro(), 'unit_test', 'john_doe', 'ARO');
        $message = 'add_parent_group_object failed';
        $this->assert($result, $message);
    }
    public function del_parent_group_object_aro()
    {
        $result = $this->gacl_api->del_group_object($this->get_group_id_parent_aro(), 'unit_test', 'john_doe', 'ARO');
        $message = 'del_group_object failed';
        $this->assert($result, $message);
    }

    public function add_child_group_object_aro()
    {
        $result = $this->gacl_api->add_group_object($this->get_group_id_child_aro(), 'unit_test', 'jane_doe', 'ARO');
        $message = 'add_child_group_object failed';
        $this->assert($result, $message);
    }
    public function del_child_group_object_aro()
    {
        $result = $this->gacl_api->del_group_object($this->get_group_id_child_aro(), 'unit_test', 'jane_doe', 'ARO');
        $message = 'del_child_group_object failed';
        $this->assert($result, $message);
    }

    /** AXO GROUP **/

    public function get_group_id_parent_axo()
    {
        $result = $this->gacl_api->get_group_id(null, 'AXO Group 1', 'AXO');
        $message = 'get_group_id_parent_aro failed';
        $this->assert($result, $message);

        return $result;
    }

    public function get_group_id_child_axo()
    {
        $result = $this->gacl_api->get_group_id(null, 'AXO Group 2', 'AXO');
        $message = 'get_group_id_child_axo failed';
        $this->assert($result, $message);

        return $result;
    }

    public function get_group_parent_id_axo()
    {
        $parent_id = $this->gacl_api->get_group_parent_id($this->get_group_id_child_axo(), 'AXO');
        //Make sure it matches with the actual parent.
        if ($parent_id === $this->get_group_id_parent_axo()) {
            $result = true;
        } else {
            $result = false;
        }
        $message = 'get_group_parent_id_aro failed';
        $this->assert($result, $message);

        return $result;
    }

    public function get_group_data_axo()
    {
        list($id, $parent_id, $value, $name, $lft, $rgt) = $this->gacl_api->get_group_data($this->get_group_id_parent_axo(), 'AXO');
        //Check all values in the resulting array.
        if ($id > 0 and $parent_id >= 0 and strlen($name) > 0 and $lft >= 1 and $rgt > 1) {
            $result = true;
        } else {
            $result = false;
        }
        $message = 'get_group_data_axo failed';
        $this->assert($result, $message);

        return $result;
    }

    public function add_group_parent_axo()
    {
        $result = $this->gacl_api->add_group('group_1', 'AXO Group 1', 0, 'AXO');
        $message = 'add_group failed';
        $this->assert($result, $message);
    }

    public function del_group_parent_axo()
    {
        $result = $this->gacl_api->del_group($this->get_group_id_parent_axo(), true, 'AXO');
        $message = 'del_group failed';
        $this->assert($result, $message);
    }

    public function add_group_child_axo()
    {
        $result = $this->gacl_api->add_group('group_2', 'AXO Group 2', $this->get_group_id_parent_axo(), 'AXO');
        $message = 'add_group failed';
        $this->assert($result, $message);
    }

    public function del_group_child_axo()
    {
        $result = $this->gacl_api->del_group($this->get_group_id_child_axo(), true, 'AXO');
        $message = 'del_group failed';
        $this->assert($result, $message);
    }

    public function add_group_object_axo()
    {
        $result = $this->gacl_api->add_group_object($this->get_group_id_parent_axo(), 'unit_test', 'object_1', 'AXO');
        $message = 'add_group_object failed';
        $this->assert($result, $message);
    }

    public function del_group_object_axo()
    {
        $result = $this->gacl_api->del_group_object($this->get_group_id_parent_axo(), 'unit_test', 'object_1', 'AXO');
        $message = 'del_group_object failed';
        $this->assert($result, $message);
    }
}

// initialise test suite
$suite = new gacl_test_suite();

//This comes in handy.
//$suite->gacl_api->db->debug=TRUE;

// general
$suite->addTest(new phpgacl_api_test('get_version'));
$suite->addTest(new phpgacl_api_test('get_schema_version'));

$suite->addTest(new phpgacl_api_test('count_all'));

// build structure
$suite->addTest(new phpgacl_api_test('add_object_section_aco'));
$suite->addTest(new phpgacl_api_test('get_object_section_section_id_aco'));
$suite->addTest(new phpgacl_api_test('add_object_aco'));
$suite->addTest(new phpgacl_api_test('get_object_id_aco'));

$suite->addTest(new phpgacl_api_test('add_object_section_aro'));
$suite->addTest(new phpgacl_api_test('get_object_section_section_id_aco'));
$suite->addTest(new phpgacl_api_test('add_object_aro'));
//Test the below with ACLs as well... I haven't gotten around to that just yet.
$suite->addTest(new phpgacl_api_test('edit_object_section_aro'));
$suite->addTest(new phpgacl_api_test('get_object_id_aro'));
$suite->addTest(new phpgacl_api_test('add_object2_aro'));
$suite->addTest(new phpgacl_api_test('get_object2_id_aro'));

$suite->addTest(new phpgacl_api_test('add_object_section_axo'));
$suite->addTest(new phpgacl_api_test('get_object_section_section_id_axo'));
$suite->addTest(new phpgacl_api_test('add_object_axo'));
$suite->addTest(new phpgacl_api_test('get_object_id_axo'));

$suite->addTest(new phpgacl_api_test('add_group_parent_aro'));
$suite->addTest(new phpgacl_api_test('edit_group_parent_aro'));
$suite->addTest(new phpgacl_api_test('get_group_id_parent_aro'));
$suite->addTest(new phpgacl_api_test('get_group_data_aro'));
$suite->addTest(new phpgacl_api_test('add_group_child_aro'));
$suite->addTest(new phpgacl_api_test('get_group_id_child_aro'));
$suite->addTest(new phpgacl_api_test('get_group_parent_id_aro'));

$suite->addTest(new phpgacl_api_test('add_parent_group_object_aro'));
//Try adding twice. Both times should return true.
$suite->addTest(new phpgacl_api_test('add_parent_group_object_aro'));
$suite->addTest(new phpgacl_api_test('add_child_group_object_aro'));

$suite->addTest(new phpgacl_api_test('get_parent_group_objects_aro'));
$suite->addTest(new phpgacl_api_test('get_parent_group_objects_recurse_aro'));


$suite->addTest(new phpgacl_api_test('add_group_parent_axo'));
$suite->addTest(new phpgacl_api_test('get_group_id_parent_axo'));
$suite->addTest(new phpgacl_api_test('get_group_data_axo'));
$suite->addTest(new phpgacl_api_test('add_group_child_axo'));
$suite->addTest(new phpgacl_api_test('get_group_id_child_axo'));
$suite->addTest(new phpgacl_api_test('add_group_object_axo'));
$suite->addTest(new phpgacl_api_test('get_group_parent_id_axo'));


// clean up...
$suite->addTest(new phpgacl_api_test('del_parent_group_object_aro'));
$suite->addTest(new phpgacl_api_test('del_child_group_object_aro'));
$suite->addTest(new phpgacl_api_test('del_group_child_aro'));
$suite->addTest(new phpgacl_api_test('del_group_parent_aro'));

$suite->addTest(new phpgacl_api_test('del_group_object_axo'));
$suite->addTest(new phpgacl_api_test('del_group_child_axo'));
$suite->addTest(new phpgacl_api_test('del_group_parent_axo'));

$suite->addTest(new phpgacl_api_test('del_object_aco'));
$suite->addTest(new phpgacl_api_test('del_object_section_aco'));

//Test group reparenting - Order of this test is important.
$suite->addTest(new phpgacl_api_test('del_group_parent_no_reparent_aro'));
$suite->addTest(new phpgacl_api_test('del_group_parent_reparent_aro'));

$suite->addTest(new phpgacl_api_test('del_object_aro'));
$suite->addTest(new phpgacl_api_test('del_object2_aro'));
$suite->addTest(new phpgacl_api_test('del_object_section_aro'));

$suite->addTest(new phpgacl_api_test('del_object_axo'));
$suite->addTest(new phpgacl_api_test('del_object_section_axo'));

// run tests
echo '<p>Running API tests... ';
$suite->run($result);
echo '<b>Done</b></p>';

unset($suite);

// done.
