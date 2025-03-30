<?php

namespace App\Repositories;
use App\Models\WebConfig;
use App\Interfaces\WebConfigInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WebConfigRepository implements WebConfigInterface
{
    private $webConfig;

    public function __construct(WebConfig $webConfig)
    {
        $this->webConfig = $webConfig;
    }

    public function getConfig()
    {
        $result = $this->webConfig->first();

        if ($result == null) {
            $result = $this->webConfig->create([
                'hero_landing_copywriting' => 'Business partner that’s fit for all business sizes.',
                'partner_copywriting' => 'Collaborating with trusted partners to drive mutual growth and success.',
                'about_landing_copywriting' => 'LCoach is a division under PT. Lincoln Cipta Solusi, specializing in skill development through an innovative blend of Coaching, Learning, and Consulting designs, focusing on marketing, business, and entrepreneurship.',
                'contact_copywriting' => 'Feel free to reach out to us for personalized assistance, inquiries about our services, or collaboration opportunities. Our team is here to provide the support and information you need to achieve your goals.',
                'hero_who_copywriting' => 'We bring years of experience and a proven track records.',
                'subheading_who' => 'So, who we are?',
                'who_caption_1' => 'Business Training, PT. Abadi Jaya',
                'who_caption_2' => 'Coaching, Mandiri Inhealth',
                'who_caption_3' => 'Coaching, Pertamina',
                'who_caption_4' => 'Digital Training, Astra International',
                'who_copywriting' => '<p>We are a team of professionals with years of experience in business, marketing, and entrepreneurship. We have a proven track record of helping businesses and individuals achieve their goals.</p>',
                'hero_what_copywriting' => 'We believe in empowering businesses and individuals to reach their full potential.',
                'hero_case_studies_copywriting' => 'Explore how we’ve helped businesses achieve their goals.',
                'hero_contact_copywriting' => 'We’re here to answer your business needs.',
                'hero_landing_image' => null,
                'about_landing_image_1' => null,
                'about_landing_image_2' => null,
                'about_landing_image_3' => null,
                'about_landing_image_4' => null,
                'who_image_1' => null,
                'who_image_2' => null,
                'who_image_3' => null,
                'who_image_4' => null,
                'video_landing_link' => 'https://www.youtube.com/watch?v=UXf9K9UeW4Y',
                'hero_who_image' => null,
                'hero_what_image' => null,
                'hero_case_studies_image' => null,
                'hero_contact_image' => null,
                'app_logo' => null,
            ]);
        }

        return $result;
    }

    public function update($data)
    {
        $webConfig = $this->webConfig->first();

        if (isset($data['hero_landing_page'])) {
            $filename = uniqid() . '.' . $data['hero_landing_page']->extension();
            $data['hero_landing_page']->storeAs('public/web_config', $filename);
            $data['hero_landing_page'] = $filename;

            if ($webConfig->hero_landing_page != null) {
                Storage::delete('public/web_config/' . $webConfig->hero_landing_page);
            }
        }

        if (isset($data['about_landing_image_1'])) {
            $filename = uniqid() . '.' . $data['about_landing_image_1']->extension();
            $data['about_landing_image_1']->storeAs('public/web_config', $filename);
            $data['about_landing_image_1'] = $filename;

            if ($webConfig->about_landing_image_1 != null) {
                Storage::delete('public/web_config/' . $webConfig->about_landing_image_1);
            }
        }

        if (isset($data['about_landing_image_2'])) {
            $filename = uniqid() . '.' . $data['about_landing_image_2']->extension();
            $data['about_landing_image_2']->storeAs('public/web_config', $filename);
            $data['about_landing_image_2'] = $filename;

            if ($webConfig->about_landing_image_2 != null) {
                Storage::delete('public/web_config/' . $webConfig->about_landing_image_2);
            }
        }

        if (isset($data['about_landing_image_3'])) {
            $filename = uniqid() . '.' . $data['about_landing_image_3']->extension();
            $data['about_landing_image_3']->storeAs('public/web_config', $filename);
            $data['about_landing_image_3'] = $filename;

            if ($webConfig->about_landing_image_3 != null) {
                Storage::delete('public/web_config/' . $webConfig->about_landing_image_3);
            }
        }

        if (isset($data['about_landing_image_4'])) {
            $filename = uniqid() . '.' . $data['about_landing_image_4']->extension();
            $data['about_landing_image_4']->storeAs('public/web_config', $filename);
            $data['about_landing_image_4'] = $filename;

            if ($webConfig->about_landing_image_4 != null) {
                Storage::delete('public/web_config/' . $webConfig->about_landing_image_4);
            }
        }

        if (isset($data['hero_who_image'])) {
            $filename = uniqid() . '.' . $data['hero_who_image']->extension();
            $data['hero_who_image']->storeAs('public/web_config', $filename);
            $data['hero_who_image'] = $filename;

            if ($webConfig->hero_who_image != null) {
                Storage::delete('public/web_config/' . $webConfig->hero_who_image);
            }
        }

        if (isset($data['hero_what_image'])) {
            $filename = uniqid() . '.' . $data['hero_what_image']->extension();
            $data['hero_what_image']->storeAs('public/web_config', $filename);
            $data['hero_what_image'] = $filename;

            if ($webConfig->hero_what_image != null) {
                Storage::delete('public/web_config/' . $webConfig->hero_what_image);
            }
        }

        if (isset($data['hero_case_studies_image'])) {
            $filename = uniqid() . '.' . $data['hero_case_studies_image']->extension();
            $data['hero_case_studies_image']->storeAs('public/web_config', $filename);
            $data['hero_case_studies_image'] = $filename;

            if ($webConfig->hero_case_studies_image != null) {
                Storage::delete('public/web_config/' . $webConfig->hero_case_studies_image);
            }
        }

        if (isset($data['hero_contact_image'])) {
            $filename = uniqid() . '.' . $data['hero_contact_image']->extension();
            $data['hero_contact_image']->storeAs('public/web_config', $filename);
            $data['hero_contact_image'] = $filename;

            if ($webConfig->hero_contact_image != null) {
                Storage::delete('public/web_config/' . $webConfig->hero_contact_image);
            }
        }

        if (isset($data['app_logo'])) {
            $filename = uniqid() . '.' . $data['app_logo']->extension();
            $data['app_logo']->storeAs('public/web_config', $filename);
            $data['app_logo'] = $filename;

            if ($webConfig->app_logo != null) {
                Storage::delete('public/web_config/' . $webConfig->app_logo);
            }
        }

        
        if (isset($data['who_image_1'])) {
            $filename = uniqid() . '.' . $data['who_image_1']->extension();
            $data['who_image_1']->storeAs('public/web_config', $filename);
            $data['who_image_1'] = $filename;

            if ($webConfig->who_image_1 != null) {
                Storage::delete('public/web_config/' . $webConfig->who_image_1);
            }
        }

        if (isset($data['who_image_2'])) {
            $filename = uniqid() . '.' . $data['who_image_2']->extension();
            $data['who_image_2']->storeAs('public/web_config', $filename);
            $data['who_image_2'] = $filename;

            if ($webConfig->who_image_2 != null) {
                Storage::delete('public/web_config/' . $webConfig->who_image_2);
            }
        }

        if (isset($data['who_image_3'])) {
            $filename = uniqid() . '.' . $data['who_image_3']->extension();
            $data['who_image_3']->storeAs('public/web_config', $filename);
            $data['who_image_3'] = $filename;

            if ($webConfig->who_image_3 != null) {
                Storage::delete('public/web_config/' . $webConfig->who_image_3);
            }
        }

        if (isset($data['who_image_4'])) {
            $filename = uniqid() . '.' . $data['who_image_4']->extension();
            $data['who_image_4']->storeAs('public/web_config', $filename);
            $data['who_image_4'] = $filename;

            if ($webConfig->who_image_4 != null) {
                Storage::delete('public/web_config/' . $webConfig->who_image_4);
            }
        }

        $webConfig->update($data);
        return $webConfig;
    }
}