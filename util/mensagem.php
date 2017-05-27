<?php

class teste {

    public function foo() {
        //...

        Alert::message('Message', 'Optional Title');
        Alert::basic('Basic Message', 'Mandatory Title');
        Alert::info('Info Message', 'Optional Title');
        Alert::success('Success Message', 'Optional Title');
        Alert::error('Error Message', 'Optional Title');
        Alert::warning('Warning Message', 'Optional Title');

        Alert::basic('Basic Message', 'Mandatory Title')
                ->autoclose(3500);

        Alert::error('Error Message', 'Optional Title')
                ->persistent('Close');

        return redirect('/');
    }

}
