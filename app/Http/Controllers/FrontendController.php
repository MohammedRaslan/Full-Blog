<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class FrontendController extends Controller
{
    public function HomePage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $about = App\About::find(1);
        $skills = App\Skill::all();
        $home = App\HomePage::find(1);
        $sliders = App\Slider::all();
        $features = App\Feature::all();
        $services = App\Service::all();
        $counters = App\Counter::all();
        $partners = App\Partner::all();
        $faqs = App\Faq::all();
        $heading = App\Heading::find(1);
        $pricing = App\Pricing::all();
        $pricingfeatures = App\PricingFeature::all();
        $testimonials = App\Testimonial::all();
        $team = App\Team::all();
        $projects = App\Project::all();
        $projects_cat = App\ProjectCat::all();
        $posts = App\Post::all();
        $pages = App\Page::all();
        return view('Frontend.home')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'about' => $about,
            'skills' => $skills,
            'home' => $home,
            'sliders' => $sliders,
            'features' => $features,
            'services' => $services,
            'counters' => $counters,
            'partners' => $partners,
            'faqs' => $faqs,
            'pricing' => $pricing,
            'pricingfeatures' => $pricingfeatures,
            'testimonials' => $testimonials,
            'team' => $team,
            'projects' => $projects,
            'projects_cat' => $projects_cat,
            'posts' => $posts,
            'pages' => $pages,
            'mapInfo' => $mapInfo,
        ]);
    }

    public function AboutPage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $about = App\About::find(1);
        $skills = App\Skill::all();
        $counters = App\Counter::all();
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.about')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'about' => $about,
            'skills' => $skills,
            'counters' => $counters,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function FeaturesPage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $features = App\Feature::all();
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.features')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'about' => $about,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'features' => $features,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function ServicesPage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $services = App\Service::all();
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.services')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'about' => $about,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'services' => $services,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function SingleServicePage($id)
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $services = App\Service::all();
        $heading = App\Heading::find(1);
        $singleservice = App\Service::find($id);
        $pages = App\Page::all();
        return view('Frontend.service')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'about' => $about,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'services' => $services,
            'singleservice' => $singleservice,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function ProjectsPage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $projects = App\Project::all();
        $projects_cat = App\ProjectCat::all();
        $pages = App\Page::all();
        return view('Frontend.projects')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'about' => $about,
            'metas' => $metas,
            'color' => $color,
            'projects' => $projects,
            'projects_cat' => $projects_cat,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function SingleProjectPage($id)
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $project = App\Project::find($id);
        $pages = App\Page::all();
        return view('Frontend.project')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'about' => $about,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'project' => $project,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function TeamPage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $team = App\Team::all();
        $pages = App\Page::all();
        return view('Frontend.team')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'about' => $about,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'team' => $team,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function PricesPage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $pricing = App\Pricing::all();
        $pricingfeatures = App\PricingFeature::all();
        $pages = App\Page::all();
        return view('Frontend.prices')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'about' => $about,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'pricing' => $pricing,
            'pricingfeatures' => $pricingfeatures,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function TestimonialsPage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $partners = App\Partner::all();
        $heading = App\Heading::find(1);
        $testimonials = App\Testimonial::all();
        $pages = App\Page::all();
        return view('Frontend.testimonials')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'about' => $about,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'partners' => $partners,
            'testimonials' => $testimonials,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function BlogPage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Post::all();
        $pages = App\Page::all();
        return view('Frontend.blog')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'about' => $about,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function SinglePostPage($id)
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $post = App\Post::find($id);
        $posts = App\Post::all();
        $pages = App\Page::all();
        return view('Frontend.post')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'about' => $about,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'post' => $post,
            'posts' => $posts,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function FaqPage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $faqs = App\Faq::all();
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.faq')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'about' => $about,
            'metas' => $metas,
            'color' => $color,
            'faqs' => $faqs,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function ContactPage()
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.contact')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'about' => $about,
            'metas' => $metas,
            'color' => $color,
            'pages' => $pages,
            'mapInfo' => $mapInfo,

        ]);
    }

    public function PagesPage($id)
    {
        $infos = App\Info::find(1);
        $mapInfo =App\Map::find(1);
        $socials = App\Social::find(1);
        $about = App\About::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        $currentPage = App\Page::find($id);
        $title = $currentPage->title;
        return view('Frontend.page')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'about' => $about,
            'metas' => $metas,
            'color' => $color,
            'pages' => $pages,
            'title' => $title,
            'currentPage' => $currentPage,
            'mapInfo' => $mapInfo,
        ]);
    }
}
