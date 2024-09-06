
# KCDC Housing Collections Plugin

## Plugin Name: KCDC Housing Manager

## Table of Contents
1. **Project Overview**
2. **Plugin Structure and Naming**
3. **Custom Post Type Setup**
4. **Admin Panel Customization**
5. **Predefined Arrays for Admin Handling**
6. **Gravity Forms & Advanced Custom Fields Integration**
7. **Frontend: Housing Collection Display**
8. **Dynamic Landing Pages Creation**
9. **JavaScript and Interactivity**
10. **Custom Styles and CSS Integration**
11. **Summary**

---

## 1. Project Overview

The **KCDC Housing Manager** is a WordPress plugin that allows admins to create, manage, and display housing collections dynamically. Each collection can be grouped into landing pages that are created automatically based on the admin's configurations. The plugin will include:
- A custom post type named **Housing Collections**.
- An admin interface to manage housing collections and enable/disable certain listings.
- Predefined arrays to handle specific settings.
- A frontend display for users to interact with and view housing options.
- Integration with **Gravity Forms** and **Advanced Custom Fields** to manage form data and custom fields for housing information.
- Integration of your brand’s colors, typography, and JavaScript for enhanced interactivity.

---

## 2. Plugin Structure and Naming

The plugin will be named **KCDC Housing Manager**, and the project folder should be structured as follows:

```bash
/kcdc-housing-manager
│
├── kcdc-housing-manager.php
├── /admin
│   ├── housing-admin-panel.php
│   ├── predefined-arrays.php
│   └── settings.php
├── /includes
│   ├── custom-post-type.php
│   ├── gravity-forms-integration.php
│   └── acf-integration.php
├── /public
│   ├── housing-display.php
│   ├── styles.css
│   └── scripts.js
```

---

## 3. Custom Post Type Setup

The custom post type for **Housing Collections** will store the housing data. This will allow the admin to create housing collections grouped under different categories. The setup will be done in the `/includes/custom-post-type.php` file:

- **Post Type Name:** `housing_collection`
- **Supports:** Title, Editor, Thumbnail, Custom Fields
- **Taxonomies:** Categories and Tags for organization

```php
function kcdc_register_housing_collections_cpt() {
    register_post_type('housing_collection', array(
        'labels' => array(
            'name' => 'Housing Collections',
            'singular_name' => 'Housing Collection',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
    ));
}
add_action('init', 'kcdc_register_housing_collections_cpt');
```

---

## 4. Admin Panel Customization

The admin panel will include a dedicated menu to manage housing collections and settings. This includes toggling collections on and off, setting predefined arrays, and custom settings.

### Steps:
1. **Admin Menu:** Create a new menu for the plugin within the WordPress admin dashboard.
2. **Custom Page:** A settings page where admins can toggle collections and manage arrays.

Example admin menu registration in `/admin/housing-admin-panel.php`:

```php
function kcdc_housing_admin_menu() {
    add_menu_page('KCDC Housing Manager', 'Housing Manager', 'manage_options', 'kcdc-housing-manager', 'kcdc_housing_admin_page');
}
add_action('admin_menu', 'kcdc_housing_admin_menu');

function kcdc_housing_admin_page() {
    echo '<div class="wrap"><h1>KCDC Housing Manager</h1></div>';
}
```

---

## 5. Predefined Arrays for Admin Handling

The predefined arrays allow the admin to quickly categorize housing collections. These arrays will be managed through the admin panel. Example:

```php
$housing_categories = array(
    'Low Income Housing',
    'Senior Living',
    'Disabled Access',
    'Publicly Funded'
);
```

The admin will be able to check/uncheck these categories on the housing collection pages. This will be built using a combination of **Advanced Custom Fields (ACF)** and custom admin page fields.

---

## 6. Gravity Forms & Advanced Custom Fields Integration

We will integrate **Gravity Forms** to handle form submissions and **ACF** to manage additional housing collection fields such as price, amenities, and location.

- **Gravity Forms:** Forms for users to submit inquiries or applications for specific housing options.
- **ACF:** Custom fields to add housing details like availability, price range, and more.

Example ACF field setup in `/includes/acf-integration.php`:

```php
if( function_exists('acf_add_local_field_group') ) {
    acf_add_local_field_group(array(
        'key' => 'group_housing_details',
        'title' => 'Housing Details',
        'fields' => array(
            array(
                'key' => 'field_price_range',
                'label' => 'Price Range',
                'name' => 'price_range',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'housing_collection',
                ),
            ),
        ),
    ));
}
```

---

## 7. Frontend: Housing Collection Display

The housing collections will be displayed on the front end using a custom template. Each collection will show a grid of housing units with a filterable search.

The display logic will reside in `/public/housing-display.php`, which will dynamically pull in housing data based on the admin's configuration and predefined arrays.

---

## 8. Dynamic Landing Pages Creation

Dynamic landing pages will be created for each housing collection based on predefined arrays. The admin can toggle collections, which will automatically create or remove the associated landing page.

This functionality will be handled by generating WordPress pages programmatically, hooking into the `wp_insert_post` action.

---

## 9. JavaScript and Interactivity

We will add JavaScript to enhance user interaction with the housing collections display. For example, live filtering of housing collections and categories.

JavaScript will be added in `/public/scripts.js`, utilizing the brand's primary color for hover effects and transitions.

```js
(function($) {
    $('.housing-collection').on('click', function() {
        // Filter housing collections dynamically
    });
})(jQuery);
```

---

## 10. Custom Styles and CSS Integration

The plugin will use custom styles to match the KCDC brand guidelines:
- **Primary Color:** `rgb(0, 75, 141)`
- **Secondary Color:** `rgb(197, 18, 48)`
- **Text Color:** `#333333`
- **Typography:** Acumin Pro Semi Condensed

The CSS file will be included in `/public/styles.css`:

```css
body {
    font-family: 'Acumin Pro Semi Condensed', sans-serif;
    color: #333333;
}

.housing-collection {
    background-color: rgb(0, 75, 141);
    border: 1px solid #fff;
}

.housing-collection:hover {
    background-color: rgb(197, 18, 48);
}
```

---

## 11. Summary

This plugin will serve as a comprehensive solution for managing housing collections for KCDC. It will integrate custom post types, ACF, and Gravity Forms to handle data, while predefined arrays will help admins easily categorize and manage the listings. With a robust admin interface, dynamic landing pages, and custom frontend displays, the KCDC Housing Manager will streamline housing collection management for the organization.
