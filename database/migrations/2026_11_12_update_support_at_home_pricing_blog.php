<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private const BLOG_SLUG = 'support-at-home-changes-in-2026-what-families-need-to-know';

    public function up(): void
    {
        $this->replaceContent([
            'What is Changing Under Support at Home?' => 'Support at Home Updates for 2026',
            'The Australian Government is introducing several important updates aimed at improving access, affordability, and consistency across home care services.' => 'Support at Home contribution arrangements changed on 1 October 2026. The Australian Government has deferred the introduction of Support at Home price caps.',
            'While these changes are positive, they also bring new questions for families trying to understand how to access care and what costs may apply.' => 'Families should check their Support Plan, eligibility and agreed service prices with their provider.',
            '1. Personal Care to Become Fully Funded' => '1. Approved personal care and Clinical Supports',
            'One of the most significant updates is that, from October 2026, personal care services are expected to be fully funded by the government.' => 'From 1 October 2026, approved personal care attracts a 0% participant contribution as a Clinical Support.',
            'For many participants, this means no out-of-pocket contribution for these essential services.' => 'This means a 0% Support at Home participant contribution for approved personal care. Provider service prices and a participant’s other contributions may still apply.',
            '2. Introduction of Price Caps (From July 2026)' => 'Support at Home Pricing',
            'Another key change is the introduction of government price caps on home care services.' => 'Support at Home providers currently set their own service prices. Prices must be reasonable, transparent and based on the cost of delivering services.',
            'Providers will be required to charge within set limits' => 'Providers are required to publish their most frequently charged prices on their website and My Aged Care',
            'Greater transparency for families when comparing providers' => 'Providers must agree the applicable service price with each participant before charging',
            'More consistency across the sector' => 'Prices must be reasonable and transparent and based on the cost of delivering services',
            'While this is intended to protect consumers, families should still take the time to understand what is included in services and how providers structure their support.' => 'The Australian Government has deferred the introduction of Support at Home price caps.',
        ]);
    }

    public function down(): void
    {
        $this->replaceContent([
            'Support at Home Updates for 2026' => 'What is Changing Under Support at Home?',
            'Support at Home contribution arrangements changed on 1 October 2026. The Australian Government has deferred the introduction of Support at Home price caps.' => 'The Australian Government is introducing several important updates aimed at improving access, affordability, and consistency across home care services.',
            'Families should check their Support Plan, eligibility and agreed service prices with their provider.' => 'While these changes are positive, they also bring new questions for families trying to understand how to access care and what costs may apply.',
            '1. Approved personal care and Clinical Supports' => '1. Personal Care to Become Fully Funded',
            'From 1 October 2026, approved personal care attracts a 0% participant contribution as a Clinical Support.' => 'One of the most significant updates is that, from October 2026, personal care services are expected to be fully funded by the government.',
            'This means a 0% Support at Home participant contribution for approved personal care. Provider service prices and a participant’s other contributions may still apply.' => 'For many participants, this means no out-of-pocket contribution for these essential services.',
            'Support at Home Pricing' => '2. Introduction of Price Caps (From July 2026)',
            'Support at Home providers currently set their own service prices. Prices must be reasonable, transparent and based on the cost of delivering services.' => 'Another key change is the introduction of government price caps on home care services.',
            'Providers are required to publish their most frequently charged prices on their website and My Aged Care' => 'Providers will be required to charge within set limits',
            'Providers must agree the applicable service price with each participant before charging' => 'Greater transparency for families when comparing providers',
            'Prices must be reasonable and transparent and based on the cost of delivering services' => 'More consistency across the sector',
            'The Australian Government has deferred the introduction of Support at Home price caps.' => 'While this is intended to protect consumers, families should still take the time to understand what is included in services and how providers structure their support.',
        ]);
    }

    private function replaceContent(array $replacements): void
    {
        $post = DB::table('blogs')
            ->where('slug', self::BLOG_SLUG)
            ->first(['id', 'content']);

        if ($post === null) {
            return;
        }

        $content = str_replace(
            array_keys($replacements),
            array_values($replacements),
            $post->content
        );

        if ($content !== $post->content) {
            DB::table('blogs')
                ->where('id', $post->id)
                ->update([
                    'content' => $content,
                    'updated_at' => now(),
                ]);
        }
    }
};
