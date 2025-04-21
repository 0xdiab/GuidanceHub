<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            [
                "name" => "Python"
            ],
            [
                "name" => "Java"
            ],
            [
                "name" => "C++"
            ],
            [
                "name" => "JavaScript"
            ],
            [
                "name" => "C#"
            ],
            [
                "name" => "Go"
            ],
            [
                "name" => "Rust"
            ],
            [
                "name" => "Ruby"
            ],
            [
                "name" => "PHP"
            ],
            [
                "name" => "SQL"
            ],
            [
                "name" => "TypeScript"
            ],
            [
                "name" => "Bash"
            ],
            [
                "name" => "Swift"
            ],
            [
                "name" => "Kotlin"
            ],
            [
                "name" => "Threat Hunting"
            ],
            [
                "name" => "Incident Response"
            ],
            [
                "name" => "Penetration Testing"
            ],
            [
                "name" => "Vulnerability Assessment"
            ],
            [
                "name" => "Security Information and Event Management (SIEM)"
            ],
            [
                "name" => "Digital Forensics"
            ],
            [
                "name" => "Malware Analysis"
            ],
            [
                "name" => "Secure Coding"
            ],
            [
                "name" => "Firewall Management"
            ],
            [
                "name" => "Identity and Access Management (IAM)"
            ],
            [
                "name" => "Network Security"
            ],
            [
                "name" => "Endpoint Security"
            ],
            [
                "name" => "Red Teaming"
            ],
            [
                "name" => "Blue Teaming"
            ],
            [
                "name" => "Threat Intelligence"
            ],
            [
                "name" => "Network Protocols"
            ],
            [
                "name" => "TCP/IP"
            ],
            [
                "name" => "DNS"
            ],
            [
                "name" => "DHCP"
            ],
            [
                "name" => "VLANs"
            ],
            [
                "name" => "Subnetting"
            ],
            [
                "name" => "Routing"
            ],
            [
                "name" => "Switching"
            ],
            [
                "name" => "Firewalls"
            ],
            [
                "name" => "VPN"
            ],
            [
                "name" => "Network Monitoring"
            ],
            [
                "name" => "Packet Analysis"
            ],
            [
                "name" => "Wireshark"
            ],
            [
                "name" => "SNMP"
            ],
            [
                "name" => "Load Balancing"
            ],
            [
                "name" => "Object-Oriented Programming (OOP)"
            ],
            [
                "name" => "Data Structures and Algorithms"
            ],
            [
                "name" => "Design Patterns"
            ],
            [
                "name" => "Software Testing"
            ],
            [
                "name" => "Agile Methodologies"
            ],
            [
                "name" => "Version Control (Git)"
            ],
            [
                "name" => "Continuous Integration/Continuous Deployment (CI/CD)"
            ],
            [
                "name" => "DevOps"
            ],
            [
                "name" => "Microservices"
            ],
            [
                "name" => "RESTful APIs"
            ],
            [
                "name" => "Software Architecture"
            ],
            [
                "name" => "Requirements Analysis"
            ],
            [
                "name" => "UML"
            ],
            [
                "name" => "Debugging"
            ],
            [
                "name" => "Code Review"
            ]
            
        ];

        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill['name'],
            ]);
        }



    }
}








