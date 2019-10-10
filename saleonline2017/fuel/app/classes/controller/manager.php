<?php

class Controller_Manager extends Controller_Base
{

    public function action_index()
    {
        $view                    = View::forge('manager/master_table');
        $this->template->title   = __('title.index_title');
        $this->template->content = $view;
    }

}
