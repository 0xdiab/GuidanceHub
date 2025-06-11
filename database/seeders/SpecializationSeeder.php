<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            [
                "name" => "Web Development"
            ],
            [
                "name" => "Cybersecurity"
            ],
            [
                "name" => "Machine Learning"
            ],
            [
                "name" => "Deep Learning"
            ],
            [
                "name" => "Penetration Testing"
            ],
            [
                "name" => "Mobile Development"
            ],
            [
                "name" => "iOS Development"
            ],
            [
                "name" => "Android Development"
            ],
            [
                "name" => "Software Engineering"
            ],
            [
                "name" => "DevOps Engineering"
            ],
            [
                "name" => "Cloud Computing"
            ],
            [
                "name" => "Game Development"
            ],
            [
                "name" => "Data Science"
            ],
            [
                "name" => "Data Engineering"
            ],
            [
                "name" => "Blockchain Development"
            ],
            [
                "name" => "Artificial Intelligence"
            ],
            [
                "name" => "Computer Vision"
            ],
            [
                "name" => "Natural Language Processing"
            ],
            [
                "name" => "Embedded Systems"
            ],
            [
                "name" => "Network Engineering"
            ],
            [
                "name" => "UI/UX Design"
            ],
            [
                "name" => "Database Administration"
            ],
            [
                "name" => "Full Stack Development"
            ],
            [
                "name" => "Frontend Development"
            ],
            [
                "name" => "Backend Development"
            ],
            [
                "name" => "Ethical Hacking"
            ],
            [
                "name" => "Information Security"
            ],
            [
                "name" => "IT Support"
            ],
            [
                "name" => "Site Reliability Engineering"
            ],
            [
                "name" => "Robotics"
            ],
            [
                "name" => "Big Data"
            ],
            [
                "name" => "Digital Forensics"
            ],
            [
                "name" => "Malware Analysis"
            ],
            [
                "name" => "Security Operations (SOC)"
            ],
            [
                "name" => "Cloud Security"
            ],
            [
                "name" => "IT Governance & Compliance"
            ],
            [
                "name" => "Software Testing & QA"
            ],
            [
                "name" => "Augmented Reality (AR)"
            ],
            [
                "name" => "Virtual Reality (VR)"
            ],
            [
                "name" => "Quantum Computing"
            ],
            [
                "name" => "Bioinformatics"
            ],
            [
                "name" => "Autonomous Systems"
            ],
            [
                "name" => "Voice Assistant Development"
            ],
            [
                "name" => "Systems Architecture"
            ],
            [
                "name" => "Technical Writing"
            ],
            [
                "name" => "IT Project Management"
            ],
            [
                "name" => "Business Intelligence"
            ]

        ];

        foreach ($specializations as $specialization) {
            Specialization::create([
                'name' => $specialization['name'],
            ]);
        }
    }
}
