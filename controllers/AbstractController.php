<?php

abstract class AbstractController {
    protected array $services = [];

    public function addService(string $name, object $service): void{
        $this->services[$name] = $service;
    }

    protected function getService(string $name): object{
        return $this->services[$name];
    }
}