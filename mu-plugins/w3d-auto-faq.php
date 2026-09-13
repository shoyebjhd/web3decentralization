<?php
/**
 * W3D Auto FAQ Schema
 * Adds FAQPage JSON-LD to posts missing Rank Math FAQ blocks.
 * Covers: courses (hardcoded), chains/tools/pages/lessons (H2 extraction).
 */
add_action('wp_head', 'w3d_auto_faq_schema', 9999);

add_action('wp_head', 'w3d_home_breadcrumb_schema', 9998);

function w3d_home_breadcrumb_schema() {
    if (!is_front_page() || is_admin() || is_feed()) return;

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array(
            array('@type' => 'ListItem', 'position' => 1, 'name' => 'Web3 Decentralization', 'item' => home_url('/')),
        ),
    );

    echo "\n<!-- W3D Home Breadcrumb -->\n";
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}

function w3d_auto_faq_schema() {
    if (is_admin() || is_feed()) return;

    // Handle category archives
    if (is_category()) {
        w3d_output_category_faq();
        return;
    }

    // Handle CPT archives (courses, chains, glossary)
    if (is_post_type_archive('course') || is_post_type_archive('chain') || is_post_type_archive('llms_glossary')) {
        w3d_output_archive_faq();
        return;
    }

    // Handle the blog/posts page (is_home)
    if (is_home()) {
        w3d_output_blog_faq();
        return;
    }

    if (!is_single() && !is_page()) return;

    global $post;
    if (!$post) return;

    $post_type = get_post_type($post->ID);

    // Skip glossary — they have Rank Math FAQ
    if ($post_type === 'llms_glossary') return;

    // Check Rank Math FAQ meta
    $rm_faq = get_post_meta($post->ID, 'rank_math_faq', true);
    if (!empty($rm_faq)) return;

    // Check content for Rank Math FAQ block
    if (strpos($post->post_content, 'rank-math-faq-block') !== false) return;
    if (strpos($post->post_content, 'wp-block-rank-math-faq-block') !== false) return;

    $slug = $post->post_name;
    $faq_items = array();

    // Pages: hardcoded FAQ (index pages with no H2s)
    if ($post_type === 'page') {
        $faq_items = w3d_page_faq($slug);
    }

    // Courses: hardcoded FAQ (no H2s in LifterLMS course pages)
    if ($post_type === 'course') {
        $faq_items = w3d_course_faq($slug);
    }

    // Everything else: extract from H2 headings
    if (empty($faq_items)) {
        $faq_items = w3d_extract_faq_from_content($post->post_content);
    }

    // Fallback: extract from H3 headings if no H2s found
    if (empty($faq_items)) {
        $faq_items = w3d_extract_faq_from_h3($post->post_content);
    }

    if (empty($faq_items)) return;

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array(),
    );

    foreach ($faq_items as $item) {
        $schema['mainEntity'][] = array(
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => $item['a'],
            ),
        );
    }

    echo "\n<!-- W3D Auto FAQ Schema -->\n";
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}

function w3d_course_faq($slug) {
    $courses = array(
        'blockchain-basics' => array(
            array('q' => 'What will I learn in this course?', 'a' => 'How blockchains actually work from first principles: why they were invented, how blocks link, who runs the network, and how consensus works without central authorities.'),
            array('q' => 'Who is this course for?', 'a' => 'Complete beginners with zero blockchain knowledge. No technical background required.'),
            array('q' => 'How long does the course take?', 'a' => 'About 2-3 hours total. Each lesson is 10-15 minutes.'),
        ),
        'defi-101' => array(
            array('q' => 'What will I learn in this course?', 'a' => 'The fundamentals of decentralized finance: how DEXs work, what liquidity pools are, how yield farming operates, and the risks of DeFi protocols.'),
            array('q' => 'Who is this course for?', 'a' => 'Anyone curious about DeFi who wants to understand how decentralized financial systems work without relying on intermediaries.'),
            array('q' => 'Do I need a wallet?', 'a' => 'Yes, you will need a Web3 wallet like MetaMask to follow along with the practical examples in this course.'),
        ),
        'wallets-security-101' => array(
            array('q' => 'What will I learn in this course?', 'a' => 'How to secure your crypto assets: wallet types, seed phrase best practices, hardware wallet setup, and common scam avoidance techniques.'),
            array('q' => 'Who is this course for?', 'a' => 'Anyone holding or planning to hold cryptocurrency who wants to protect their assets from theft and loss.'),
            array('q' => 'How long does the course take?', 'a' => 'About 2 hours. Short focused lessons you can complete at your own pace.'),
        ),
        'smart-contracts-for-beginners' => array(
            array('q' => 'What will I learn in this course?', 'a' => 'What smart contracts are, how they execute on blockchains, real-world use cases, and how to read basic Solidity code.'),
            array('q' => 'Who is this course for?', 'a' => 'Beginners who want to understand smart contracts without necessarily becoming a developer.'),
            array('q' => 'Do I need coding experience?', 'a' => 'No. The course explains smart contracts conceptually with visual examples. Coding is optional.'),
        ),
        'crypto-fundamentals-from-zero' => array(
            array('q' => 'What will I learn in this course?', 'a' => 'Everything from zero: what cryptocurrency is, how wallets work, how to buy safely, and the key concepts every crypto user needs.'),
            array('q' => 'Who is this course for?', 'a' => 'Absolute beginners who have never used cryptocurrency and want a structured learning path.'),
            array('q' => 'How long does the course take?', 'a' => 'About 3-4 hours across multiple lessons. Designed to be completed over a few days.'),
        ),
        'l2-developer-path' => array(
            array('q' => 'What will I learn in this course?', 'a' => 'Layer 2 development fundamentals: the OP Stack, deploying on Base testnet, gas optimization, and reading L2 risk assessments.'),
            array('q' => 'Who is this course for?', 'a' => 'Developers and technical users who want to build on or understand Layer 2 scaling solutions.'),
            array('q' => 'Do I need Solidity experience?', 'a' => 'Basic Solidity knowledge helps but is not required. The course starts with L2-specific concepts.'),
        ),
        'security-and-self-custody-advanced' => array(
            array('q' => 'What will I learn in this course?', 'a' => 'Advanced security practices: multisig setup, social recovery, transaction simulation, and protecting against sophisticated attacks.'),
            array('q' => 'Who is this course for?', 'a' => 'Intermediate to advanced crypto users who want to level up their security practices beyond basic wallet hygiene.'),
            array('q' => 'How long does the course take?', 'a' => 'About 2-3 hours. Each lesson covers a specific advanced security topic.'),
        ),
        'certified-decentralization-analyst' => array(
            array('q' => 'What will I learn in this course?', 'a' => 'How to evaluate blockchain decentralization using the W3D methodology: the four pillars, scoring systems, and audit checklists.'),
            array('q' => 'Who is this course for?', 'a' => 'Aspiring analysts, researchers, and anyone who wants to critically evaluate blockchain projects.'),
            array('q' => 'Is there a certification?', 'a' => 'Yes. Complete all lessons and pass the final exam to earn your Certified Decentralization Analyst credential.'),
        ),
    );

    return isset($courses[$slug]) ? $courses[$slug] : array();
}

function w3d_page_faq($slug) {
    $pages = array(
        'learning-path' => array(
            array('q' => 'What is the W3D learning path?', 'a' => 'A structured, free curriculum covering blockchain fundamentals, DeFi, security, and advanced topics. Start as a beginner and work toward analyst-level knowledge.'),
            array('q' => 'Is the learning path really free?', 'a' => 'Yes. All courses, lessons, and materials are free and open-source under MIT and CC-BY-4.0 licenses.'),
            array('q' => 'How long does the full learning path take?', 'a' => 'About 40-60 hours total across all skill levels. You can go at your own pace.'),
        ),
        'beginners' => array(
            array('q' => 'What courses are in the beginner track?', 'a' => 'Blockchain Basics, Crypto Fundamentals From Zero, Wallets Security 101, and DeFi 101.'),
            array('q' => 'Do I need any prior knowledge?', 'a' => 'No. The beginner track assumes zero knowledge of blockchain or cryptocurrency.'),
            array('q' => 'How do I start?', 'a' => 'Begin with Blockchain Basics, which covers how blockchains work from first principles.'),
        ),
        'analyst' => array(
            array('q' => 'What is the analyst track?', 'a' => 'An advanced learning path covering decentralization evaluation, the four pillars, scoring systems, and audit methodologies used by the W3D research team.'),
            array('q' => 'What prerequisites are there?', 'a' => 'You should complete the beginner and intermediate tracks first. Familiarity with blockchain basics is required.'),
            array('q' => 'Is there a certification?', 'a' => 'Yes. Complete all analyst courses and pass the final exam to earn the Certified Decentralization Analyst credential.'),
        ),
        'learn' => array(
            array('q' => 'What can I learn on W3D?', 'a' => 'Blockchain fundamentals, DeFi, security, smart contracts, Layer 2 solutions, and decentralization analysis. All courses are free and open-source.'),
            array('q' => 'Who are the courses for?', 'a' => 'Everyone from complete beginners to advanced researchers. Our structured learning paths guide you from zero knowledge to analyst-level expertise.'),
            array('q' => 'How are the courses structured?', 'a' => 'Each course has 5-10 lessons of 10-15 minutes. Courses are grouped into beginner, intermediate, and advanced learning paths.'),
        ),
        'terminal' => array(
            array('q' => 'What is the W3D Terminal?', 'a' => 'An open-source Web3 terminal for reading on-chain data, scanning networks, and performing stress tests across multiple blockchains.'),
            array('q' => 'Which blockchains does the Terminal support?', 'a' => 'Bitcoin, Ethereum, Solana, Cardano, Avalanche, Cosmos, XRP, Sui, Aptos, Near, and more.'),
            array('q' => 'Is the Terminal free to use?', 'a' => 'Yes. The Terminal is MIT-licensed and completely free. No API keys or accounts required for basic use.'),
        ),
    );

    return isset($pages[$slug]) ? $pages[$slug] : array();
}

function w3d_extract_faq_from_content($raw_content) {
    $parts = preg_split('/<h2[^>]*>(.*?)<\/h2>/is', $raw_content, -1, PREG_SPLIT_DELIM_CAPTURE);
    $items = array();

    for ($i = 1; $i < count($parts) - 1; $i += 2) {
        $question = trim(html_entity_decode(strip_tags($parts[$i]), ENT_QUOTES, 'UTF-8'));
        if (empty($question) || strlen($question) > 150 || strlen($question) < 5) continue;

        $after = $parts[$i + 1];
        preg_match('/<p[^>]*>(.*?)<\/p>/is', $after, $p_match);
        if (empty($p_match[1])) continue;

        $answer = trim(html_entity_decode(strip_tags($p_match[1]), ENT_QUOTES, 'UTF-8'));
        if (empty($answer) || strlen($answer) < 20) continue;
        if (strlen($answer) > 300) $answer = substr($answer, 0, 297) . '...';

        $items[] = array('q' => $question, 'a' => $answer);
        if (count($items) >= 3) break;
    }

    return $items;
}

function w3d_extract_faq_from_h3($raw_content) {
    $parts = preg_split('/<h3[^>]*>(.*?)<\/h3>/is', $raw_content, -1, PREG_SPLIT_DELIM_CAPTURE);
    $items = array();

    for ($i = 1; $i < count($parts) - 1; $i += 2) {
        $question = trim(html_entity_decode(strip_tags($parts[$i]), ENT_QUOTES, 'UTF-8'));
        if (empty($question) || strlen($question) > 150 || strlen($question) < 5) continue;
        if (!preg_match('/\?|how|what|why|when|where|who|is|are|do|does|can|should|will/i', $question)) continue;

        $after = $parts[$i + 1];
        preg_match('/<p[^>]*>(.*?)<\/p>/is', $after, $p_match);
        if (empty($p_match[1])) continue;

        $answer = trim(html_entity_decode(strip_tags($p_match[1]), ENT_QUOTES, 'UTF-8'));
        if (empty($answer) || strlen($answer) < 20) continue;
        if (strlen($answer) > 300) $answer = substr($answer, 0, 297) . '...';

        $items[] = array('q' => $question, 'a' => $answer);
        if (count($items) >= 3) break;
    }

    return $items;
}

function w3d_output_category_faq() {
    $cat = get_queried_object();
    if (!$cat || !is_category()) return;

    $name = single_cat_title('', false);
    if (empty($name)) return;

    $desc = category_description();

    $faq_items = array();
    $faq_items[] = array(
        'q' => "What is $name?",
        'a' => $desc ? trim(html_entity_decode(strip_tags($desc), ENT_QUOTES, 'UTF-8')) : "W3D covers $name topics including guides, reviews, and research on blockchain technology and decentralization."
    );
    $faq_items[] = array(
        'q' => "How many $name articles does W3D have?",
        'a' => "W3D publishes independent, open-source $name content. All guides follow our published methodology and are backed by on-chain data."
    );
    $faq_items[] = array(
        'q' => "Is W3D $name content free?",
        'a' => "Yes. All W3D $name content is free, open-source, and MIT-licensed. We never charge for educational material."
    );

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array(),
    );
    foreach ($faq_items as $item) {
        $schema['mainEntity'][] = array(
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => $item['a'],
            ),
        );
    }
    echo "\n<!-- W3D Auto FAQ Schema (category) -->\n";
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}

function w3d_output_archive_faq() {
    $labels = array(
        'course' => array('Courses', 'free, open-source blockchain courses covering everything from fundamentals to advanced decentralization analysis.', 'beginner-friendly lessons with clear explanations', 'no-login courses that are MIT and CC-BY-4.0 licensed'),
        'chain' => array('Chain audits', 'in-depth decentralization audits of major blockchains using the W3D four-pillar methodology and on-chain data.', 'live decentralization scores updated weekly', 'independent audits based on public on-chain data'),
        'llms_glossary' => array('Glossary terms', 'plain-English definitions of blockchain, crypto, and DeFi terminology, each explained without jargon.', 'short definitions you can understand in under a minute', 'community-updated and open-source entries'),
    );

    $which = null;
    if (is_post_type_archive('course')) $which = 'course';
    elseif (is_post_type_archive('chain')) $which = 'chain';
    elseif (is_post_type_archive('llms_glossary')) $which = 'llms_glossary';
    if (!$which) return;
    list($name, $what, $extra, $free) = $labels[$which];

    $faq_items = array(
        array('q' => "What is the W3D $name archive?", 'a' => "This is the collection of all W3D $what"),
        array('q' => "How is this content organized?", 'a' => "Each entry follows a consistent structure with $extra."),
        array('q' => "Is this content really free?", 'a' => "Yes. All content is $free."),
    );

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array(),
    );
    foreach ($faq_items as $item) {
        $schema['mainEntity'][] = array(
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => $item['a'],
            ),
        );
    }
    echo "\n<!-- W3D Auto FAQ Schema (archive) -->\n";
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}

function w3d_output_blog_faq() {
    $faq_items = array(
        array(
            'q' => 'What kind of articles does the W3D blog publish?',
            'a' => 'In-depth guides, chain audits, and research on blockchain, DeFi, and decentralization. Every post is based on published methodology and on-chain data.',
        ),
        array(
            'q' => 'Is W3D a paid publication?',
            'a' => 'No. W3D is a free, open-source educational project. All blog content is licensed under MIT and CC-BY-4.0.',
        ),
        array(
            'q' => 'How often is the blog updated?',
            'a' => 'New research and guides are published as they are completed, with live decentralization scores refreshed weekly.',
        ),
    );

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array(),
    );
    foreach ($faq_items as $item) {
        $schema['mainEntity'][] = array(
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => $item['a'],
            ),
        );
    }
    echo "\n<!-- W3D Auto FAQ Schema (blog) -->\n";
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}
