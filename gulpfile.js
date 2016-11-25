'use strict';
var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-ruby-sass');
var connect =require('gulp-connect');

gulp.task('css', function()
{
    return sass('sass/*', {style : "expanded"})
        .pipe(gulp.dest('css/'))
        .pipe(connect.reload());
});

gulp.task('watch', function() {
    gulp.watch("sass/*", ['css']);
    gulp.watch("*.html").on('change', browserSync.reload);
});