<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Classroom>
 */
class ClassroomFactory extends Factory
{
    public function definition(): array
    {
        $majors = ['PPLG', 'DKV', 'ANIMASI', 'TKJT', 'TEKNIK GRAFIKA'];
        $classNames = [];

        foreach ($majors as $major) {
            foreach (range(1, 5) as $classNumber) {
                $classNames[] = "11 {$major} {$classNumber}";
            }
        }

        $existingClassNames = Classroom::query()
            ->whereIn('name', $classNames)
            ->pluck('name')
            ->all();
        $availableClassNames = array_values(array_diff($classNames, $existingClassNames));

        if ($availableClassNames === []) {
            throw new \LogicException('No unique classroom names are available for the factory.');
        }

        $name = fake()->unique()->randomElement($availableClassNames);
        [, $major] = explode(' ', $name, 3);

        return [
            'name' => $name,
            'major' => $major,
            'grade_level' => 11,
            'homeroom_teacher' => fake()->name(),
        ];
    }
}
