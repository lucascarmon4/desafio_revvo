const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cleanCSS = require("gulp-clean-css");
const sourcemaps = require("gulp-sourcemaps");

const paths = {
    scss: "styles/**/*.scss",
    cssOutput: "public/assets/css",
};

function dev() {
    return gulp
        .src("styles/main.scss")
        .pipe(sourcemaps.init())
        .pipe(sass().on("error", sass.logError))
        .pipe(postcss([autoprefixer()]))
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest(paths.cssOutput));
}

function build() {
    return gulp
        .src("styles/main.scss")
        .pipe(sass().on("error", sass.logError))
        .pipe(postcss([autoprefixer()]))
        .pipe(cleanCSS())
        .pipe(gulp.dest(paths.cssOutput));
}

function watchFiles() {
    gulp.watch(paths.scss, dev);
}

exports.dev = gulp.series(dev, watchFiles);
exports.build = build;
