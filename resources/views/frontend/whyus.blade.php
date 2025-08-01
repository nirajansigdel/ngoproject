@extends('frontend.layouts.master')

@section('content')

<style>
    .bg-paper {
        background: url('{{ asset('image/paper-texture.jpg') }}');
        background-size: cover;
        background-repeat: repeat;
    }

    .quote-style {
        font-size: 1.25rem;
        font-weight: 600;
        font-style: italic;
        color: #000;
        line-height: 1.6;
    }

    .quote-style::before {
        content: "“";
        font-size: 2rem;
        color: #666;
        vertical-align: top;
    }

    .section-title {
        color: #2f8b45;
        font-weight: 700;
        text-align: center;
        text-transform: uppercase;
    }

    .text-gray {
        color: #666;
    }

    .why-usimage {
        height: 36vh;
        max-height: 450px;
        object-fit: cover;
        width: 100%;
    }

    /* Card grid section */
    .card-grid-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .card {
        height: 400px; /* fixed card height */
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        display: flex;
        flex-direction: column;
    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-content {
        padding: 15px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        min-height: 0;
    }

    .card-content p {
        overflow-y: auto;
    }

    @media (max-width: 992px) {
        .card-grid-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .card-grid-container {
            grid-template-columns: 1fr;
        }

        .card {
            height: auto; /* allow flexible height on mobile */
        }
    }
</style>

<section class="py-5 bg-paper container-fluid">
    <div class="container">

        <!-- Title -->
        <h2 class="section-title mb-5">Why Umbrella Trekking Nepal?</h2>

        <div class="row gx-5">
            <!-- Quote Column -->
            <div class="col-md-4 mb-4 mb-md-0">
                <p class="quote-style">
                    Umbrella Trekking combines an experienced partner organisation with our disadvantaged young adults,
                    eager to learn
                </p>
            </div>

            <!-- Text Column -->
            <div class="col-md-8">
                <p class="text-gray">
                    The Umbrella Foundation provides its youths with support for two years after they graduate from
                    secondary school to enable them to gain a greater sense of responsibility and an opportunity to
                    make a life for themselves. Our committed Youth and Education team provides career counselling and
                    visits them regularly to monitor their progress and discuss any issues with them. Our hope is to aid
                    their reintegration back into Nepal society and help them develop skills that can aid their own
                    families and home communities.
                </p>
                <p class="text-gray">
                    The Nepali economy is extremely fragile however and with the tourism sector one of the few areas
                    of growth, many of our youths expressed a keen interest to get involved. Through a dedicated
                    Umbrella Supporter, Mick Bromley of Wilderness Trekking, some of our Youths gained valuable experience in
                    the trekking industry, which further whetted their appetite.
                </p>
                <p class="text-gray">
                    This led to the idea of Umbrella Trekking where rather than having to rely solely on the generosity
                    of others we can give them something in return (a safe, enjoyable and ethical trip) while offering
                    our disadvantaged young adults valuable job opportunities. It gives them a chance to show their
                    skills and give back to The Umbrella Foundation that continues to care for hundreds of children
                    throughout Nepal.
                </p>
            </div>
        </div>

        <div class="row mt-3">
            <img src="{{ asset('image/why1.png') }}" class="why-usimage rounded">
        </div>

        <!-- Help Youth Section -->
        <div class="row gx-5 mt-5">
            <div class="col-md-12">
                <h2 class="section-title mb-5">HELP UMBRELLA'S YOUTHS</h2>
                <p class="text-gray">
                    The unemployment rate in Nepal is very high and finding employment, even for qualified
                    candidates, is a huge challenge facing Nepal’s youths. Through our Next Steps Youth & Education
                    Programme Umbrella aims to equip our young adults with the skills and knowledge to give them a
                    head start in the search for a sustainable career.
                </p>
                <p class="text-gray">
                    In their final year of school, children take the School Leaving Certificate (SLC) examinations.
                    Upon finishing these, they undertake a volunteer placement in their home village. When results
                    are published, they enter our Next Steps Youth & Education Programme and have the option of
                    taking either an academic or vocational course.
                </p>
                <p class="text-gray">
                    We help them to move out into their own flats, where they learn to live, cook and budget for
                    themselves. Our youth officer organises regular social events to ensure they remain actively
                    involved in our community. We are with them every step of the way, counseling them and providing
                    educational support and living allowances for the duration of their chosen course, and
                    thereafter continue to be available to them in a supportive capacity.
                </p>
                <p class="text-gray">
                    Our intention is to facilitate their reintegration into Nepali society and help them develop
                    skills that can aid their families and home communities. Our approach is focused on fostering
                    the following characteristics: Independence; Responsibility; and Employability.
                </p>
                <p class="text-gray">
                    Through their employment with Umbrella Trekking, our youths can gain a foothold into one of the
                    few growing areas for the Nepali economy: Tourism. By traveling with Umbrella Trekking you are
                    helping them on the path to independence and gifting them with the opportunity to make a life
                    for themselves.
                </p>
            </div>

            <div class="row mt-3">
                <img src="{{ asset('image/why2.png') }}" class="why-usimage rounded">
            </div>
        </div>

        <!-- Support Foundation Section -->
        <div class="row gx-5 mt-5">
            <div class="col-md-12">
                <h2 class="section-title mb-5">SUPPORT THE FOUNDATION</h2>
                <p class="text-gray">
                    The Umbrella Foundation is a non-profit NGO and registered charity in Ireland, Holland, UK, USA and
                    Australia working to alleviate the impact of trafficking, poverty and war in Nepal.
                </p>
                <p class="text-gray">
                    Established in 2005 in response to the growing number of illegal ‘orphanages’ neglecting children’s
                    most basic rights – food, education, safe shelter, healthcare and love – we are a family-first
                    charity which rescues vulnerable children and reintegrates them with their families and rural
                    communities.
                </p>
                <p class="text-gray">
                    When this is not possible, we support them in our homes until such a time as they can stand on their
                    own two feet. As a responsible and ethical organisation, we work alongside the Child Welfare Board
                    to prevent further trafficking and corrupt children’s homes from operating.
                </p>
            </div>

            <div class="row mt-3">
                <img src="{{ asset('image/why3.png') }}" class="why-usimage rounded">
            </div>
        </div>

        <!-- Experienced Local Partners -->
        <div class="row gx-5 mt-5">
            <div class="col-md-12">
                <h2 class="section-title mb-5">EXPERIENCED LOCAL PARTNERS</h2>
                <p class="text-gray">
                    Umbrella Trekking combines experienced local guides and partner organisations with our young adults
                    who are very familiar with nature and the culture of Nepal with most coming from the Himalaya
                    regions. Our supporting partners are Nature Treks Himalaya (www.nature-treks.com), one of Nepal’s
                    most respectable eco-friendly organisations and they are our fully implementing partners in Nepal
                    for all logistics and arrangements.
                </p>
                <p class="text-gray">
                    Nature Treks are one of the leading proprietor of ethical and eco-tourism in Nepal and are
                    affiliated with the Trekking Agencies’ Association of Nepal (TAAN), The International Ecotourism
                    Society, the Nepal River Conservation Trust and Bird Conservation Nepal.
                </p>
                <p class="text-gray">
                    Their offices are located in the centre of Thamel, the tourist area of Kathmandu. Operating on
                    behalf of Umbrella Trekking, their staff are both friendly and experienced, having led tour groups
                    extensively throughout Nepal.
                </p>
                <p class="text-gray">
                    Nature Treks are long term supporters of The Umbrella Foundation and provide their services at low
                    cost so all profits go towards helping Umbrella protect Nepal’s most vulnerable children.
                </p>
            </div>
        </div>
    </div>
</section>



<!-- Dynamic Why Us Section -->
<section class="why-us-section container my-5">
      <h1 style="text-align:center; font-family:Arial, sans-serif; font-size:3rem; color:#2f8b45; margin:40px 0; letter-spacing:2px; text-transform:uppercase; text-shadow:1px 1px 3px rgba(0,0,0,0.2);">
  Why Us?
</h1>
    <div class="card-grid-container">
        @foreach($whyus as $why)
            <div class="card">
                @if($why->image)
                    <img src="{{ asset('uploads/whyus/' . $why->image) }}" alt="{{ $why->heading }}">
                @endif
                <div class="card-content">
                    <h2>{{ $why->heading }}</h2>
                    @if($why->subtitle)
                        <h3>{{ $why->subtitle }}</h3>
                    @endif
                    <p>{{ $why->content }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>


@endsection
