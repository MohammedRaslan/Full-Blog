<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeadingsRequestValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'home_history' => 'required|string|max:191',
            'home_skills' => 'required|string|max:191',
            'home_why' => 'required|string|max:191',
            'home_services' => 'required|string|max:191',
            'home_projects' => 'required|string|max:191',
            'home_faq' => 'required|string|max:191',
            'home_pricing' => 'required|string|max:191',
            'home_testimonials' => 'required|string|max:191',
            'home_partners' => 'required|string|max:191',
            'home_news' => 'required|string|max:191',
            'footer_contact' => 'required|string|max:191',
            'footer_links' => 'required|string|max:191',
            'footer_keep' => 'required|string|max:191',
            'footer_newsletter' => 'required|string|max:191',
            'about_title' => 'required|string|max:191',
            'about_mission' => 'required|string|max:191',
            'about_vision' => 'required|string|max:191',
            'about_history' => 'required|string|max:191',
            'about_skills' => 'required|string|max:191',
            'features_why' => 'required|string|max:191',
            'features_choice' => 'required|string|max:191',
            'services_title' => 'required|string|max:191',
            'services_discover' => 'required|string|max:191',
            'services_other' => 'required|string|max:191',
            'services_contact' => 'required|string|max:191',
            'projects_title' => 'required|string|max:191',
            'projects_quality' => 'required|string|max:191',
            'projects_overview' => 'required|string|max:191',
            'projects_details' => 'required|string|max:191',
            'team_title' => 'required|string|max:191',
            'team_meet' => 'required|string|max:191',
            'prices_title' => 'required|string|max:191',
            'prices_most' => 'required|string|max:191',
            'testimonials_title' => 'required|string|max:191',
            'testimonials_say' => 'required|string|max:191',
            'testimonials_loyals' => 'required|string|max:191',
            'blog_title' => 'required|string|max:191',
            'blog_share' => 'required|string|max:191',
            'blog_recent' => 'string|max:191',
            'faq_title' => 'required|string|max:191',
            'faq_any' => 'required|string|max:191',
            'contact_title' => 'required|string|max:191',
            'contact_send' => 'required|string|max:191',
            'faq_keep' => 'required|string|max:191',
        ];
    }
}
