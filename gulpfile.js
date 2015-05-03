var gulp = require('gulp');
var zip = require('gulp-zip');

gulp.task('zip', function () {
    return gulp.src(['cif_importer/**/*'], {base: "."})
        .pipe(zip('cif_importer.zip'))
        .pipe(gulp.dest('./build'));
});

gulp.task('default', ['zip']);