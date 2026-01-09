# Kenlow WordPress Theme

Custom WordPress theme for Kenlow, built with Bootstrap 4, Gulp, and Webpack.

---

## Repository & Deployment

**GitHub Repository**: https://github.com/Bangonline/kenlow

### Branch & Environment

| Branch | Environment | WP Engine Install | Auto-Deploy |
|--------|-------------|-------------------|-------------|
| `main` | Production | `kenlow` | ✅ Yes |

**Note:** This site has no staging environment - all commits to `main` deploy directly to production.

### Deployment Workflow

**Complete deployment guide:** `docs/standards/PROCESSES/WPENGINE_DEPLOYMENT.md`

**Deploy to Production:**
```bash
git checkout main
# Make changes
git add .
git commit -m "Your changes"
git push origin main  # Auto-deploys to kenlow (live site)
```

### GitHub Actions

- `.github/workflows/deploy-production.yml` - Auto-deploys `main` → kenlow

**What gets deployed:**
- All theme files except: `node_modules/`, `assets/src/`, `gulp/`, `.github/`, hidden files
- Compiled assets are included (`assets/dist/`)
- Source files (SCSS, JS) are excluded from deployment

---

## Local Development

### Prerequisites

- Local by Flywheel or similar WordPress local environment
- Node.js and npm (for Gulp/Webpack build tools)

### Setup

1. **Clone repository:**
   ```bash
   git clone https://github.com/Bangonline/kenlow.git
   cd kenlow
   ```

2. **Install dependencies:**
   ```bash
   npm install
   ```

3. **Install theme** in WordPress:
   - Copy to `wp-content/themes/kenlow/`
   - Activate in WordPress admin

### Build System

**Gulp + Webpack tasks:**
- `npm run start` - Watch for changes and auto-compile (development mode)
- `npm run build` - Build for production (minified assets)

**Development workflow:**
```bash
# Start watching for changes
npm run start

# Edit files in assets/src/scss/ and assets/src/js/
# Compiled files automatically generated in assets/dist/

# Commit both source and compiled files
git add .
git commit -m "Update styles"
git push origin main  # Auto-deploys to production
```

**Build output:**
- `assets/dist/css/main.css` - Compiled and minified CSS
- `assets/dist/js/main.js` - Transpiled and bundled JavaScript
- `assets/dist/fonts/` - Copied font files

---

## Features

- **Bootstrap 4 Framework** - Responsive grid and components
- **ACF Integration** - Custom fields for flexible content
- **Gulp + Webpack Build System** - SCSS compilation, ES6 transpiling, asset optimization
- **Breakpoint Slicer** - Fast and maintainable media queries
- **Testimonial Archive** - Custom post type for testimonials
- **ES6 JavaScript** - Transpiled with Babel for browser compatibility
- **Responsive Design** - Mobile-first approach with Bootstrap

---

## File Structure

```
kenlow/
├── .github/workflows/       # GitHub Actions deployment
├── acf-json/               # ACF field group JSON
├── assets/
│   ├── dist/               # Compiled assets (tracked in git)
│   │   ├── css/           # Compiled CSS
│   │   ├── js/            # Transpiled JS
│   │   └── fonts/         # Font files
│   └── src/               # Source files (excluded from deployment)
│       ├── scss/          # SCSS source files
│       ├── js/            # ES6 JavaScript source
│       ├── img/           # Images
│       └── fonts/         # Font source files
├── configure/             # Theme configuration modules
├── docs/
│   └── standards/         # Symlink to bang-web-standards
├── gulp/                  # Gulp build configuration
├── page_template/         # ACF flexible content components
├── functions.php          # Theme functionality
├── style.css             # Theme header (required by WordPress)
├── gulpfile.js           # Gulp build configuration
├── package.json          # Node dependencies
└── README.md            # This file
```

---

## WP Engine Environment

### Production (kenlow)
- **URL**: www.kenlow.com.au (or production URL)
- **Purpose**: Live site
- **Branch**: `main`
- **Auto-deploy**: Yes

**⚠️ Important:** There is no staging environment. All changes deploy directly to production. Test thoroughly locally before pushing.

---

## Git Workflow Best Practices

1. **Test locally** before committing (no staging environment)
2. **Commit compiled assets** (production needs them)
3. **Build for production** before pushing:
   ```bash
   npm run build
   git add assets/dist/
   git commit -m "Update compiled assets"
   ```
4. **Create feature branches** for larger changes:
   ```bash
   git checkout -b feature/new-feature
   # Work on feature, test thoroughly
   git push origin feature/new-feature
   # Create PR to main (review before merging)
   ```

---

## Troubleshooting

**Deployment Issues:**
1. Check [GitHub Actions](https://github.com/Bangonline/kenlow/actions) logs
2. Review `docs/standards/PROCESSES/WPENGINE_DEPLOYMENT.md`
3. Verify WPEngine environment name in workflow file

**Common Issues:**
- Files not deploying → Check `.github/workflows/deploy-production.yml` configuration
- Permission denied → Verify SSH keys in WPEngine SSH Gateway
- CSS/JS not updating → Ensure compiled assets are committed to git
- Build errors → Check `npm install` completed successfully
- See full troubleshooting guide in standards documentation

---

## Support

For issues or questions, contact Bang Digital development team.

**Repository**: https://github.com/Bangonline/kenlow

---

**Last Updated**: January 2026
**Deployment Status**: Production Active (No Staging)
