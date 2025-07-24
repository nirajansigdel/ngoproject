@extends('frontend.layouts.master')

@section('content')

    <!-- Optional custom style for paper background and quote formatting -->
    <style>
        .bg-paper {
            background: url('{{ asset('image/paper-texture.jpg') }}');
            /* Add your texture image */
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
            /* adjust this as needed */
            object-fit: cover;
            width: 100%;
        }
    </style>

    <section class="py-5 bg-paper container-fluid">
        <div class="container">



            <!-- Title -->
            <h2 class="section-title mb-5">Why Umbrella Trekking Nepal?</h2>
            <div class="row ">
                <div class="row gx-5">
                    <!-- Quote Column -->
                    <div class="col-md-4 mb-4 mb-md-0">
                        <p class="quote-style">
                            Umbrella Trekking combines an experienced partner organisation with our disadvantaged young
                            adults,
                            eager to learn
                        </p>
                    </div>

                    <!-- Text Column -->
                    <div class="col-md-8">
                        <p class="text-gray">
                            The Umbrella Foundation provides it’s youths with support for two years after they graduate from
                            secondary school to enable them to gain a greater sense of responsibility and an opportunity to
                            make
                            a life for themselves. Our committed Youth and Education team provides career counselling and
                            visits
                            them regularly to monitor their progress and discuss any issues with them. Our hope is to aid
                            their
                            reintegration back into Nepal society and help them develop skills that can aid their own
                            families
                            and home communities.
                        </p>
                        <p class="text-gray">
                            The Nepali economy is extremely fragile however and with the tourism sector one of the few areas
                            of
                            growth, many of our youths expressed a keen interest to get involved. Through a dedicated
                            Umbrella
                            Supporter, Mick Bromley of Wilderness Trekking, some of our Youths gained valuable experience in
                            the
                            trekking industry, which further whetted their appetite.


                        </p>
                        <p class="text-gray">
                            This led to the idea of Umbrella Trekking where rather than having to rely solely on the
                            generosity
                            of others we can give them something in return (a safe, enjoyable and ethical trip) while
                            offering
                            our disadvantaged young adults valuable job opportunities. It gives them a chance to show their
                            skills and give back to The Umbrella Foundation that continues to care for hundreds of children
                            throughout Nepal.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <img src="{{ asset('image/why1.png') }}" class="why-usimage rounded">
                </div>
            </div>





            <div class="row gx-5">
                <!-- Text Column -->
                <div class="col-md-12 mt-5">
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

                <div class="row">
                    <img src="{{ asset('image/why2.png') }}" class="why-usimage rounded">
                </div>
            </div>

            <div class="row gx-5">
                <!-- Text Column -->
                <div class="col-md-12 mt-5">
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

                <div class="row">
                    <img src="{{ asset('image/why3.png') }}" class="why-usimage rounded">
                </div>
            </div>
            <div class="row gx-5">
                <!-- Text Column -->
                <div class="col-md-12 mt-5">
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

@endsection