<?php
public function index() #public обязательно
{
// Передаем данные во вьюшку
return view('index', [
'name' => 'Максимка',
'project' => 'Triopenisini'
]);
}
