<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ScheduleItem;
use App\Models\Speaker;
use Illuminate\Database\Seeder;

class ScheduleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $speakers = Speaker::query()->where('type', 'speaker')->get();

        $schedule = [
            // Training Day - Wednesday, October 22
            [
                'day' => '2026-10-22',
                'items' => [
                    ['start' => '09:00', 'end' => '10:00', 'title' => 'Registration & Check-in', 'type' => 'special', 'location' => 'Main Lobby'],
                    ['start' => '10:00', 'end' => '10:30', 'title' => 'Welcome Coffee', 'type' => 'break', 'location' => 'Café Area'],
                    ['start' => '10:30', 'end' => '12:30', 'title' => 'Pastors & Leaders Session: Morning', 'type' => 'session', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'Special equipping session for pastors and church leaders.'],
                    ['start' => '12:30', 'end' => '14:00', 'title' => 'Lunch', 'type' => 'meal', 'location' => 'Dining Hall'],
                    ['start' => '14:00', 'end' => '16:00', 'title' => 'Pastors & Leaders Session: Afternoon', 'type' => 'session', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'Continued training and ministry for leaders.'],
                    ['start' => '16:00', 'end' => '16:30', 'title' => 'Coffee Break', 'type' => 'break', 'location' => 'Café Area'],
                    ['start' => '16:30', 'end' => '18:00', 'title' => 'Q&A and Prayer for Leaders', 'type' => 'session', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'Open discussion and personal ministry time.'],
                    ['start' => '18:00', 'end' => '19:00', 'title' => 'Dinner', 'type' => 'meal', 'location' => 'Dining Hall'],
                    ['start' => '19:30', 'end' => '21:30', 'title' => 'Evening Worship & Ministry', 'type' => 'worship', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'Opening night of worship and impartation.'],
                ],
            ],
            // Day 1 - Thursday, October 23
            [
                'day' => '2026-10-23',
                'items' => [
                    ['start' => '07:00', 'end' => '08:00', 'title' => 'Morning Prayer', 'type' => 'worship', 'location' => 'Chapel'],
                    ['start' => '08:00', 'end' => '09:00', 'title' => 'Breakfast', 'type' => 'meal', 'location' => 'Dining Hall'],
                    ['start' => '09:30', 'end' => '11:00', 'title' => 'Morning Session: "The Fire of Revival"', 'type' => 'session', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'Setting the tone for the conference with a powerful message about the fire of revival sweeping across Europe.'],
                    ['start' => '11:00', 'end' => '11:30', 'title' => 'Coffee Break', 'type' => 'break', 'location' => 'Café Area'],
                    ['start' => '11:30', 'end' => '13:00', 'title' => 'Workshops Session 1', 'type' => 'session', 'location' => 'Various Rooms', 'description' => 'Choose from multiple workshop tracks.'],
                    ['start' => '13:00', 'end' => '14:30', 'title' => 'Lunch', 'type' => 'meal', 'location' => 'Dining Hall'],
                    ['start' => '15:00', 'end' => '16:30', 'title' => 'Afternoon Session: "Awakening the Nations"', 'type' => 'session', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'A prophetic word for the nations of Europe and Gods plan for awakening.'],
                    ['start' => '17:00', 'end' => '18:30', 'title' => 'Free Time & Recreation', 'type' => 'break', 'location' => 'Campus'],
                    ['start' => '18:30', 'end' => '19:30', 'title' => 'Dinner', 'type' => 'meal', 'location' => 'Dining Hall'],
                    ['start' => '20:00', 'end' => '22:00', 'title' => 'Evening Celebration: Worship & Ministry', 'type' => 'worship', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'An extended time of worship and ministry with personal prayer available.'],
                ],
            ],
            // Day 2 - Friday, October 24
            [
                'day' => '2026-10-24',
                'items' => [
                    ['start' => '07:00', 'end' => '08:00', 'title' => 'Morning Prayer', 'type' => 'worship', 'location' => 'Chapel'],
                    ['start' => '08:00', 'end' => '09:00', 'title' => 'Breakfast', 'type' => 'meal', 'location' => 'Dining Hall'],
                    ['start' => '09:30', 'end' => '11:00', 'title' => 'Morning Session: "Unity in the Spirit"', 'type' => 'session', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'Exploring the power of unity across denominations and nations.'],
                    ['start' => '11:00', 'end' => '11:30', 'title' => 'Coffee Break', 'type' => 'break', 'location' => 'Café Area'],
                    ['start' => '11:30', 'end' => '13:00', 'title' => 'Workshops Session 2', 'type' => 'session', 'location' => 'Various Rooms', 'description' => 'Continue with your chosen workshop track.'],
                    ['start' => '13:00', 'end' => '14:30', 'title' => 'Lunch', 'type' => 'meal', 'location' => 'Dining Hall'],
                    ['start' => '15:00', 'end' => '16:30', 'title' => 'Panel Discussion: "Revival in Europe Today"', 'type' => 'session', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'Hear testimonies and insights from leaders across different European nations.'],
                    ['start' => '17:00', 'end' => '18:30', 'title' => 'Free Time', 'type' => 'break', 'location' => 'Campus'],
                    ['start' => '18:30', 'end' => '19:30', 'title' => 'Dinner', 'type' => 'meal', 'location' => 'Dining Hall'],
                    ['start' => '20:00', 'end' => '22:30', 'title' => 'Night of Encounter', 'type' => 'worship', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'A powerful evening of worship, prophetic ministry, and encounters with the Holy Spirit.'],
                ],
            ],
            // Day 3 - Saturday, October 25
            [
                'day' => '2026-10-25',
                'items' => [
                    ['start' => '07:00', 'end' => '08:00', 'title' => 'Morning Prayer', 'type' => 'worship', 'location' => 'Chapel'],
                    ['start' => '08:00', 'end' => '09:00', 'title' => 'Breakfast', 'type' => 'meal', 'location' => 'Dining Hall'],
                    ['start' => '09:30', 'end' => '11:00', 'title' => 'Morning Session: "Go and Make Disciples"', 'type' => 'session', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'A call to action for the Great Commission across Europe.'],
                    ['start' => '11:00', 'end' => '11:30', 'title' => 'Coffee Break', 'type' => 'break', 'location' => 'Café Area'],
                    ['start' => '11:30', 'end' => '13:00', 'title' => 'Outreach & City Prayer Walk', 'type' => 'special', 'location' => 'City Center', 'description' => 'Join us as we pray over the city and share God\'s love.'],
                    ['start' => '13:00', 'end' => '14:30', 'title' => 'Lunch', 'type' => 'meal', 'location' => 'Dining Hall'],
                    ['start' => '15:00', 'end' => '17:00', 'title' => 'Closing Celebration Service', 'type' => 'worship', 'location' => 'Main Hall', 'speaker' => true, 'description' => 'Our final gathering with worship, communion, commissioning, and sending.'],
                    ['start' => '17:00', 'end' => '18:00', 'title' => 'Farewell & Departure', 'type' => 'special', 'location' => 'Main Lobby'],
                ],
            ],
        ];

        $speakerIndex = 0;

        foreach ($schedule as $daySchedule) {
            foreach ($daySchedule['items'] as $sortOrder => $item) {
                $speakerId = null;
                if (isset($item['speaker']) && $item['speaker'] && $speakers->count() > 0) {
                    $speakerId = $speakers->get($speakerIndex % $speakers->count())?->id;
                    $speakerIndex++;
                }

                ScheduleItem::create([
                    'title' => $item['title'],
                    'description' => $item['description'] ?? null,
                    'day' => $daySchedule['day'],
                    'start_time' => $item['start'],
                    'end_time' => $item['end'],
                    'type' => $item['type'],
                    'location' => $item['location'],
                    'speaker_id' => $speakerId,
                    'is_published' => true,
                    'sort_order' => $sortOrder,
                ]);
            }
        }
    }
}
