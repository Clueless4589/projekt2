/**
 * Gulpfile.
 * 
 * @see https://doccheck.githost.io/setups/templating
 */

// Required dependencies
var gulp = require('gulp'),
    colors = require('ansi-colors'),
    concat = require('gulp-concat'),
    cssmin = require('gulp-cssmin'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    debug = require('gulp-debug'),
    imagemin = require('gulp-imagemin'),
    sequence = require('run-sequence'),
    autoprefixer = require('gulp-autoprefixer'),
    del = require('del');

// Configuration
var hasConfig = false,
    devServerDeployment = false,
    devServerCmsDeployment = false;

try {
    var config = require('./gulpconfig.json');
    hasConfig = true;
    devServerDeployment = config.devServerDeployment;
    devServerCmsDeployment = config.devServerCmsDeployment;
    console.log(colors.green.bold(colors.symbols.check, 'Found gulpconfig.json file!'));
} catch (ex) {
    console.log(colors.red.bold(colors.symbols.cross, 'Could not find gulpconfig.json file!'));
    console.log(colors.grey('Do you want automagical dev server deployment? Try the following steps.'));
    console.log(colors.grey('1) Copy and rename gulpconfig.example.json to gulpconfig.json'));
    console.log(colors.grey('2) Adjust gulpconfig.json with fitting path'));
    console.log(colors.grey('3) Try some gulping'));
}

// Local paths
var srcPath = '../src/',
    distPath = '../dist/',
    nodemodulesPath = 'node_modules/';

// Dev server dist path (template)
var devServerDistPath = (hasConfig && config.devServerPath && config.devServerDistPath)
    ? config.devServerPath + config.devServerDistPath
    : false;

// Dev server dist path (cms)
var devServerCmsDistPath = (hasConfig && config.devServerPath && config.devServerCmsDistPath)
    ? config.devServerPath + config.devServerCmsDistPath
    : false;

var mainScssFiles = [
    srcPath + 'sass/main.scss'
];

var mainJsFiles = [
    nodemodulesPath + 'jquery/dist/jquery.js',
    nodemodulesPath + 'popper.js/dist/umd/popper.js',
    nodemodulesPath + 'bootstrap/js/dist/util.js',
    nodemodulesPath + 'bootstrap/js/dist/alert.js',
    nodemodulesPath + 'bootstrap/js/dist/button.js',
    // nodemodulesPath + 'bootstrap/js/dist/carousel.js',
    nodemodulesPath + 'bootstrap/js/dist/collapse.js',
    nodemodulesPath + 'bootstrap/js/dist/dropdown.js',
    nodemodulesPath + 'bootstrap/js/dist/index.js',
    // nodemodulesPath + 'bootstrap/js/dist/modal.js',
    // nodemodulesPath + 'bootstrap/js/dist/popover.js',
    // nodemodulesPath + 'bootstrap/js/dist/scrollspy.js',
    nodemodulesPath + 'bootstrap/js/dist/tab.js',
    // nodemodulesPath + 'bootstrap/js/dist/tooltip.js',
    srcPath + 'js/vendor/svgxuse.min.js',
    srcPath + 'js/cookie.js',
    srcPath + 'js/main.js'
];


/*
  ====================================================
  Default Task
  ====================================================
 */
gulp.task('default', function (callback) {
    sequence('css', 'js', 'img', 'fonts', callback);
});

gulp.task('refresh', function (callback) {
    sequence('clean', 'css', 'js', 'img', 'fonts', callback);
});

/*
 =====================================================
 Watch
 -----------------------------------------------------
 Watching the src files and folders for changes.
 =====================================================
 */
gulp.task('watch', function () {

    // Fonts
    gulp.watch(srcPath + 'fonts/**/*', ['fonts']);

    // Styles
    gulp.watch(srcPath + 'sass/**/*.scss', ['css']);

    // Scripts
    gulp.watch(srcPath + 'js/**/*', ['js']);

    // Images
    gulp.watch(srcPath + 'img/**/*', ['img']);
});

/*
 =====================================================
 Clean
 -----------------------------------------------------
 Cleans up files/folders.
 =====================================================
 */
gulp.task('clean', [
    'clean-local-template',
    'clean-dev-template',
    'clean-dev-cms'
]);

gulp.task('clean-local-template', function () {
    return processDeletion({
        files: [
            distPath + 'css',
            distPath + 'img',
            distPath + 'js',
            distPath + 'fonts'
        ]
    });
});

gulp.task('clean-dev-template', function () {
    return processDeletion({
        condition: devServerDeployment && devServerDistPath,
        files: [
            devServerDistPath + 'css',
            devServerDistPath + 'js',
            devServerDistPath + 'img',
            devServerDistPath + 'fonts'
        ]
    });
});

gulp.task('clean-dev-cms', function () {
    return processDeletion({
        condition: devServerCmsDeployment && devServerCmsDistPath,
        files: [
            devServerCmsDistPath + 'css',
            devServerCmsDistPath + 'js',
            devServerCmsDistPath + 'img',
            devServerCmsDistPath + 'fonts'
        ]
    });
});

/**
 * Process deletion.
 *
 * @version 1.0
 */
function processDeletion(parameters) {
    var files = parameters.files,
        condition = parameters.condition ? parameters.condition : true;

    if (condition) {
        return del(files, {
            read: false,
            force: true
        });
    }

    return false;
}

/* 
 =====================================================================
 Styles
 ---------------------------------------------------------------------
 - Compiles scss
 - Minifies css files
 - Distributes to dist/css
 =====================================================================
 */
gulp.task('css', ['css-main']);

gulp.task('css-main', function () {
    return processScss({
        name: 'main',
        files: mainScssFiles
    });
});

/**
 * Process scss.
 *
 * @version 1.0
 * @param parameters
 */
function processScss(parameters) {
    // Parameters
    var name = parameters.name;
    var files = parameters.files;
    var stream;

    stream = gulp.src(files)
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cssmin())
        .pipe(concat(name + '.min.css'));

    // Deploy to local template
    stream = stream
        .pipe(gulp.dest(distPath + 'css/'))
        .pipe(debug({title: 'copied css files: '}));

    // Deploy to dev server template
    if (devServerDeployment && devServerDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerDistPath + 'css/'))
            .pipe(debug({title: 'copied css to files: '}));
    }

    // Deploy to dev server cms
    if (devServerCmsDeployment && devServerCmsDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerCmsDistPath + 'css/'))
            .pipe(debug({title: 'copied css to files: '}));
    }

    return stream;
}

/*
 =====================================================
 Scripts
 -----------------------------------------------------
 - Uglifies js files
 - Minifies js files
 - Distributes to dist/js
 =====================================================
 */

gulp.task('js', ['js-main']);

// Main
gulp.task('js-main', function () {
    return processJs({
        name: 'main',
        files: mainJsFiles
    });
});

/**
 * Process js.
 *
 * @version 1.0
 * @param parameters
 */
function processJs(parameters) {
    // Parameters
    var name = parameters.name;
    var files = parameters.files;
    var stream;

    stream = gulp.src(files)
        .pipe(uglify())
        .pipe(concat(name + '.min.js'));

    // Deploy to local template
    stream = stream
        .pipe(gulp.dest(distPath + 'js/'))
        .pipe(debug({title: 'copied js files: '}));

    // Deploy to dev server template
    if (devServerDeployment && devServerDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerDistPath + 'js/'))
            .pipe(debug({title: 'copied js files: '}));
    }

    // Deploy to dev server cms
    if (devServerCmsDeployment && devServerCmsDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerCmsDistPath + 'js/'))
            .pipe(debug({title: 'copied js files: '}));
    }

    return stream;
}

/*
 =====================================================
 Vendor
 -----------------------------------------------------
 - Distributes to dist/vendor
 =====================================================
 */
gulp.task('vendor', function () {
    processVendor({
        files: [
            '!' + srcPath + 'vendor/**/*.css',
            '!' + srcPath + 'vendor/**/*.js',
            srcPath + 'vendor/**/*'
        ]
    });
    processVendorCss({
        files: srcPath + 'vendor/**/*.css'
    });
    processVendorJs({
        files: srcPath + 'vendor/**/*.js'
    });
});

/**
 * Process vendor files.
 *
 * @version 1.0
 * @param parameters
 */
function processVendor(parameters) {
    // Parameters
    var files = parameters.files;

    var stream = gulp.src(files);

    // Deploy to local template
    stream = stream
        .pipe(debug({title: 'processed vendor: '}))
        .pipe(gulp.dest(distPath + 'vendor/'));

    // Deploy to dev server template
    if (devServerDeployment && devServerDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerDistPath + 'vendor/'));
    }

    // Deploy to dev server cms
    if (devServerCmsDeployment && devServerCmsDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerCmsDistPath + 'vendor/'));
    }

    return stream;
}


/**
 * Process vendor css.
 *
 * @version 1.0
 * @param parameters
 */
function processVendorCss(parameters) {
    // Parameters
    var files = parameters.files;

    var stream = gulp.src(files);

    // Deploy to local template
    stream = stream
        .pipe(cssmin())
        .pipe(debug({title: 'processed vendor: '}))
        .pipe(gulp.dest(distPath + 'vendor/'));

    // Deploy to dev server template
    if (devServerDeployment && devServerDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerDistPath + 'vendor/'));
    }

    // Deploy to dev server cms
    if (devServerCmsDeployment && devServerCmsDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerCmsDistPath + 'vendor/'));
    }

    return stream;
}

/**
 * Process vendor js.
 *
 * @version 1.0
 * @param parameters
 */
function processVendorJs(parameters) {
    // Parameters
    var files = parameters.files;

    var stream = gulp.src(files);

    // Deploy to local template
    stream = stream
        .pipe(uglify())
        .pipe(debug({title: 'processed vendor: '}))
        .pipe(gulp.dest(distPath + 'vendor/'));

    // Deploy to dev server template
    if (devServerDeployment && devServerDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerDistPath + 'vendor/'));
    }

    // Deploy to dev server cms
    if (devServerCmsDeployment && devServerCmsDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerCmsDistPath + 'vendor/'));
    }

    return stream;
}

/*
 =====================================================
 Fonts
 -----------------------------------------------------
 - Distributes to dist/fonts
 =====================================================
 */
gulp.task('fonts', function () {
    return processFonts({
        files: srcPath + 'fonts/**/*'
    });
});

/**
 * Process fonts.
 *
 * @version 1.0
 * @param parameters
 */
function processFonts(parameters) {
    // Parameters
    var files = parameters.files;

    var stream = gulp.src(files);

    // Deploy to local template
    stream = stream
        .pipe(debug({title: 'processed fonts: '}))
        .pipe(gulp.dest(distPath + 'fonts/'));

    // Deploy to dev server template
    if (devServerDeployment && devServerDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerDistPath + 'fonts/'));
    }

    // Deploy to dev server cms
    if (devServerCmsDeployment && devServerCmsDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerCmsDistPath + 'fonts/'));
    }

    return stream;
}

/*
 =====================================================
 Images
 -----------------------------------------------------
 - Optimizes images
 - Distributes
 =====================================================
 */
gulp.task('img', [
    'img-main'
]);

gulp.task('img-main', function () {
    return processImages({
        files: [
            srcPath + 'img/**/*',
            '!' + srcPath + 'img/sprites/',
            '!' + srcPath + 'img/sprites/**/*'
        ]
    });
});

/**
 * Process images.
 *
 * @version 1.0
 * @param parameters
 */
function processImages(parameters) {
    // Parameters
    var files = parameters.files;
    var stream = gulp.src(files)
        // .pipe(changed(distPath + 'img/'))
        .pipe(imagemin());

    // Deploy to local template
    stream = stream
        .pipe(gulp.dest(distPath + 'img/'))
        .pipe(debug({title: 'processed image: '}));

    // Deploy to dev server template
    if (devServerDeployment && devServerDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerDistPath + 'img/'));
    }

    // Deploy to dev server cms
    if (devServerCmsDeployment && devServerCmsDistPath) {
        stream = stream
            .pipe(gulp.dest(devServerCmsDistPath + 'img/'));
    }

    return stream;
}