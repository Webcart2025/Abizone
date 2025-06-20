<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FAQ Section</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('asset/css/FAQs.css') }}">
</head>
<body>
  <div class="faq-container">
    <h2 class="faq-title">Frequently Asked <span>Questions</span></h2>

    @php
      $faqs = [
        ['question' => 'What is a visa concierge service?', 'answer' => 'A visa concierge service is a specialized service that assists individuals or businesses with their visa application process. We provide guidance, support, and expertise to help streamline and simplify your visa application process.'],
        ['question' => 'What services does Abizone offer?', 'answer' => 'As a visa concierge service, Abizone offers a range of services such as visa consultation, form filling assistance, document review, application submission, and much more. Abizone also offers assistance with forex, travel insurance, and SIM cards through a host of our partners.'],
        ['question' => 'Is having travel insurance mandatory for my booking?', 'answer' => 'Most countries require travel insurance. Please refer to the detailed checklist to know the type of requirement based on your application.'],
        ['question' => 'Do I need to have air tickets for my visa appointment?', 'answer' => 'While air tickets are generally not required for visa appointments, some countries may require you to provide a confirmed flight booking. Please refer to the visa checklist for your destination.'],
        ['question' => 'How can Abizone help me with my visa application?', 'answer' => 'Abizone can assist by providing personalized guidance and expert advice on the visa application process. We help in compiling documents, completing application forms, and ensuring compliance with necessary criteria.'],
        ['question' => 'Is Abizone affiliated with any government authorities?', 'answer' => 'Abizone is an independent entity and not affiliated with government authorities directly. We act as an intermediary between applicants and visa processing agencies.'],
        ['question' => 'What is the pricing for Abizone services?', 'answer' => 'We do charge additional fees for our services on top of the standard visa application fees. These vary depending on the assistance required and application complexity.'],
        ['question' => 'What is the recommended lead time for visa application?', 'answer' => 'Apply at least 30–45 working days before your tentative travel dates. During peak seasons, apply even earlier due to longer processing and appointment times.'],
        ['question' => 'Can you assist me in getting visa appointment slots?', 'answer' => 'Abizone can assist via the respective company or government portals. However, appointment availability is subject to their systems. We recommend applying well in advance.'],
        ['question' => 'How many countries can I apply for a visa?', 'answer' => 'Abizone supports visa applications to a wide range of countries. Availability may depend on current regulations and appointment access.'],
        ['question' => 'What are Abizone operational hours?', 'answer' => 'Our support team is available from 9 AM to 9 PM IST, all days of the week, except public holidays.'],
      ];
    @endphp

    @foreach($faqs as $index => $faq)
      <div class="faq-item{{ $index === 0 ? ' active' : '' }}">
        <div class="faq-question">
          {{ $faq['question'] }}
          <span class="icon">&#8679;</span>
        </div>
        <div class="faq-answer">
          {{ $faq['answer'] }}
        </div>
      </div>
    @endforeach
  </div>

  <script>
    document.querySelectorAll('.faq-question').forEach(question => {
      question.addEventListener('click', () => {
        question.parentElement.classList.toggle('active');
      });
    });
  </script>
</body>
</html>
