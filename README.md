# kaalbhairav.org — Website

## File Structure

```
kaalbhairav.org/
├── index.php              ← Homepage
├── about.php              ← About Kaal Bhairav
├── stories.php            ← Sacred Stories
├── 64-bhairav.php         ← 64 Forms of Bhairav
├── pooja-vidhi.php        ← Complete Pooja Procedure
├── mantra.php             ← Mantras & Tantra
├── seva.php               ← Dog Seva & Donation
├── disclaimer.php         ← Full Disclaimer & Terms
├── sitemap.xml            ← SEO Sitemap
├── robots.txt             ← Search Engine Rules
├── .htaccess              ← Clean URLs, HTTPS, Caching
├── css/
│   └── style.css          ← Main stylesheet
├── js/
│   └── main.js            ← Interactivity (flames, scroll reveal)
├── images/
│   └── og-bhairav.jpg     ← Add OG image here
└── includes/
    ├── header.php          ← Shared navigation + SEO meta
    └── footer.php          ← Shared footer
```

## Deployment on cPanel / Shared Hosting

1. Upload all files to `public_html/` directory
2. Ensure PHP 7.4+ is enabled (PHP 8.x recommended)
3. Upload an OG image at `images/og-bhairav.jpg` (1200x630 px)
4. Upload a favicon SVG at `favicon.svg` (root directory)
5. Submit `sitemap.xml` to Google Search Console

## SEO Checklist

- [x] Unique `<title>` on every page
- [x] Unique meta description on every page  
- [x] Meta keywords on every page
- [x] Open Graph tags (og:title, og:description, og:image)
- [x] Twitter Card tags
- [x] Canonical URLs
- [x] JSON-LD structured data (WebSite schema)
- [x] sitemap.xml with all pages
- [x] robots.txt allowing all crawlers
- [x] .htaccess: clean URLs, HTTPS redirect, caching, gzip
- [ ] Add Google Analytics / Search Console verification tag in header.php
- [ ] Add OG image (images/og-bhairav.jpg)
- [ ] Register at Google Search Console and submit sitemap

## Google Analytics (optional)

Add before `</head>` in `includes/header.php`:

```html
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXXXXXXX');
</script>
```

## Donation Integration

For UPI payments, edit `seva.php` and add your UPI QR code image or link.
For Razorpay/PayU integration, add their script before `</body>` in `includes/footer.php`.

## Contact

Email for seva inquiries: seva@kaalbhairav.org
