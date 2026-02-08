<?
// Function to get the slug and URL of the "opposite" language
function get_opposite_language_info() {
    // Get all available languages as an array
    $all_languages = pll_the_languages(array('raw' => 1));

    // Get the current language slug
    $current_language_slug = pll_current_language();

    $opposite_language = false;

    // Loop through all languages to find the one that is not the current one
    foreach ($all_languages as $lang) {
        if ($lang['slug'] !== $current_language_slug) {
            // Found the opposite/alternative language
            $opposite_language = $lang;
            break; // Exit the loop once found
        }
    }

    if ($opposite_language) {
        return array(
            'slug' => $opposite_language['slug'],
            'url' => $opposite_language['url'],
            'name' => $opposite_language['name'],
			'flag' => $opposite_language['flag']
        );
    } else {
        // Return null or handle the case where only one language is active
        return null;
    }
}

// Example usage in your theme files:
$opposite_lang_info = get_opposite_language_info();

if ($opposite_lang_info) {
    echo '<a href="' . esc_url($opposite_lang_info['url']) . '" title="Switch to ' . esc_attr($opposite_lang_info['name']) . '">';
    echo '<img class="langSW" src="' . $opposite_lang_info['flag'] . '" alt="language">';// Or use the slug/flag
    echo '</a>';
}
?>