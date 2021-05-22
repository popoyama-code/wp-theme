const gulp = require("gulp")

gulp.task("sass", () => {
  const sass = require("gulp-sass")
  const sassGlob = require("gulp-sass-glob")
  return gulp.src("./scss/style.scss")
  .pipe(sassGlob())
  .pipe(sass())
  .pipe(gulp.dest("./css"))
})

gulp.task('postcss', () => {
  const autoprefixer = require('autoprefixer')
  const sourcemaps = require('gulp-sourcemaps')
  const cssnano = require('gulp-cssnano')
  const postcss = require('gulp-postcss')
  return gulp.src('./css/style.css')
  .pipe(sourcemaps.init())
  .pipe(postcss([ autoprefixer() ]))
  .pipe(cssnano())
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('./dest'))
})