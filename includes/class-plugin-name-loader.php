<?php
class Plugin_Name_Loader {
    protected $actions = [];
    protected $filters = [];

    public function add_action($hook, $component, $callback) {
        $this->actions[] = compact('hook', 'component', 'callback');
    }

    public function add_filter($hook, $component, $callback) {
        $this->filters[] = compact('hook', 'component', 'callback');
    }

    public function run() {
        foreach ($this->actions as $hook) {
            add_action($hook['hook'], [$hook['component'], $hook['callback']]);
        }
        foreach ($this->filters as $hook) {
            add_filter($hook['hook'], [$hook['component'], $hook['callback']]);
        }
    }
}
