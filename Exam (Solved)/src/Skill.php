<?php
declare(strict_types=1);

namespace Coalition\Exam;

class Skill
{
    private array $properties = [];

    
    public function __call(string $name, array $arguments)
    {
        if (strpos($name, 'has') === 0) {
            return true;
        }
        
        return false;
    }

    
    public function __get(string $name)
    {
        if (substr($name, -3) === '_CT') {
            return md5($name);
        }
        
        return $this->properties[$name] ?? null;
    }

   
    public function __set(string $name, $value): void
    {
        $this->properties[$name] = $value;
    }

    
    public function __toString(): string
    {
        return 'Skill Object CT';
    }

    public function __invoke(array $numbers): int
    {
        return array_sum($numbers);
    }
}