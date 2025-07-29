<section style="position: relative; background-color: #f2992f; padding: 60px 20px; color: black; overflow: hidden;" class="rescue">
  <!-- Background image with opacity using ::before -->
  <style>
    .rescue::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: url('{{ asset('image/rescue.avif') }}') no-repeat center/cover;
      opacity: 0.15; /* adjust opacity here */
      z-index: 0;
      pointer-events: none;
    }
   .rescue > div {
      position: relative;
      z-index: 1;

      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 60px;
    }
  </style>

  <div>
    <!-- Rescue -->
    <div style="flex: 300px; max-width: 480px; text-align: center;">
      <h2 style="font-weight: 900; font-size: 28px; margin-bottom: 20px;">Rescue</h2>
      <p style="font-size: 16px; margin-bottom: 30px; line-height: 1.5;">
        Night after night, our agents enter some of the darkest places on the planet to find and rescue children trapped in sexual exploitation or trafficking.
      </p>
      <a href="{{ route('Blogpostcategory') }}" style="background-color: #ef6b20; color: white; border: none; padding: 12px 28px; font-weight: 700; font-size: 14px; cursor: pointer; border-radius: 4px; text-decoration: none;">
        LEARN MORE
      </a>
    </div>

    <!-- Reintegration -->
    <div style="flex: 1 1 300px; max-width: 480px; text-align: center;">
      <h2 style="font-weight: 900; font-size: 28px; margin-bottom: 20px;">Reintegration</h2>
      <p style="font-size: 16px; margin-bottom: 30px; line-height: 1.5;">
        When we’re able, we identify what made a child vulnerable to exploitation, and then equip them and their family overcome it – and thrive.
      </p>
      <a href="{{ route('events') }}" style="background-color: #ef6b20; color: white; border: none; padding: 12px 28px; font-weight: 700; font-size: 14px; cursor: pointer; border-radius: 4px; text-decoration: none;">
        LEARN MORE
      </a>
    </div>
  </div>
</section>






