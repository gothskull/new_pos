var gulp         = require('gulp');
var sass         = require('gulp-sass');
var browserSync  = require('browser-sync');
var reload       = browserSync.reload;
var autoprefixer = require('gulp-autoprefixer');


gulp.task('sass', () => {
  return gulp.src([
    'node_modules/bootstrap/scss/bootstrap.scss',
    './scss/**/*.scss'
  ])
  .pipe(autoprefixer())
  .pipe(sass({outputStyle: 'compressed'}))
  .pipe(gulp.dest('./vistas/css'))
  .pipe(browserSync.stream());
});

gulp.task('browser-sync', ['sass'],function(){
  var archivos = [
    './vistas/css/**/*.css',
    './controladores/**/*.php',
    './modelos/**/*.php',
    './vistas/**/*.php',
    './scss/**/*.scss',
    './vistas/js/**/*.js',
    './vistas/images/**/*.**'
  ];
  browserSync.init(archivos,{
    proxy : 'http://localhost/fdo_practica_pos/',
    notify : false
  })
});

gulp.task('js', () => {
  return gulp.src([
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/popper.js/dist/umd/popper.min.js'
  ])
  .pipe(gulp.dest('./vistas/js'))
  .pipe(browserSync.stream());
});

gulp.task('font-awesome', () => {
  return gulp.src('node_modules/font-awesome/css/font-awesome.min.css')
  .pipe(gulp.dest('./vistas/css'));
})

gulp.task('fonts', () => {
  return gulp.src('node_modules/font-awesome/fonts/*')
    .pipe(gulp.dest('./vistas/fonts'));
});

gulp.task('default', ['sass','js', 'browser-sync','font-awesome', 'fonts'], function() {
  gulp.watch(["./scss/*.scss"], ['sass']);
});
