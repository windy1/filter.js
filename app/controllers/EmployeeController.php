<?php

class EmployeeController extends BaseController {
    public function getJson() {
        $q = DB::table('employees');
        foreach (Input::all() as $key => $value) {
            if (Schema::hasColumn('employees', $key)) {
                $q = $q->where($key, 'LIKE', '%'.$value.'%');
            }
        }
        return $q->paginate(5);
    }
}
