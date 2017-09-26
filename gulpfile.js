var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var csso = require('gulp-csso');
var minify = require('gulp-minify');
var inject = require('gulp-inject');
var wiredep = require('wiredep').stream;

/* Add X-browser compatibility prefixes to all *.css */
// gulp.task('default', () =>
//     gulp.src('./assets/css/style.css')
//         .pipe(autoprefixer({
//             browsers: ['last 2 versions'],
//             cascade: false
//         }))
//         .pipe(gulpCopy('.assets/prod/css/'))
//         .pipe(gulp.dest('./assets/prod/css/'))
// );

// /* Minify css */
// gulp.task('compress-css', function () {
//     return gulp.src('./assets/raw/css/style.css')
//         .pipe(csso())
//         .pipe(gulp.dest('./assets/css/'));
// });

// /* Minify js */
// gulp.task('default', function() {
//   gulp.src('./assets/js/*.js')
//     .pipe(minify({
//         ext:{
//             src:'-raw.js',
//             min:'.js'
//         }
//     }))
//     .pipe(gulp.dest('./assets/js'))
// });

// /* Inject assets */
// gulp.task('inject-css', function () {
//   var target = gulp.src('./application/views/templates/header.php');
//   // It's not necessary to read the files (will speed up things), we're only after their paths: 
//   var sources = gulp.src(['./assets/css/*.css'], {read: false});
 
//   return target.pipe(inject(sources))
//     .pipe(gulp.dest('./application/views/templates/'));
// });

// gulp.task('inject-js', function () {
//   var target = gulp.src('./application/views/templates/footer.php');
//   // It's not necessary to read the files (will speed up things), we're only after their paths: 
//   var sources = gulp.src(['./assets/js/*.js'], {read: false});
 
//   return target.pipe(inject(sources))
//     .pipe(gulp.dest('./application/views/templates/'));
// });


// var gulp = require('gulp');
// var sass = require('gulp-sass');
// var wiredep = require('wiredep').stream;
// var inject =  require('gulp-inject');
// var tasklisting = require('gulp-task-listing');
// var clean = require('del');
// var compressImg = require('gulp-imagemin');
// var useref = require('gulp-useref');
// var	gulpif = require('gulp-if');
// var uglify = require('gulp-uglify');
// var minifyCss = require('gulp-clean-css');

// /*=======CONVERT SASS TO CSS==========*/
// gulp.task('sass-to-css', function() {
// 	return gulp 
// 		.src('./src/client/scss/*.scss')
// 		.pipe(sass().on('error', sass.logError))
// 		.pipe(gulp.dest('./src/client/app/css'));
// });

// gulp.task('sass:watch', function() {
// 	return gulp.watch('./src/client/scss/*.scss', ['sass-to-css']);
// });


// /*=========INJECT VENDOR FILES=========*/
// gulp.task('inject', function(){
// 	return gulp 
// 		.src('./src/index.html') //source
// 		.pipe(inject(gulp.src('./src/client/app/css/*.css', {read: false}))) //files that need to inject
// 		.pipe(gulp.dest('./src/')); //where to inject(index.html)
// });


/*=======WIREDEP FOR BOWER DEPENDENCIES========*/
gulp.task('wiredep', function() {
	
	return gulp 
		.src('./application/views/templates/header.php') //source
		.pipe(wiredep({ //get bower.json[main]->edit if needed
			bowerJson: require('./bower.json'),
			directory: './bower_components/bootstrap/dist/css', //root folder
			// ignorePath: '../..' //ignore 
		}))
		.pipe(gulp.dest('./src/')); //where to inject('index.html')
});

// /*=============TASK LISTING=======================*/

// gulp.task('default', function() {
// 	return tasklisting();
// });


// /*============COPYING FONTS || any FILES=====================*/

// gulp.task('copy-fonts', function() {
// 	return gulp 
// 		.src('./bower_components/font-awesome/fonts/*.*')
// 		.pipe(gulp.dest('./build/fonts'));
// });


// /*===============IMAGE COMPRESSION==========================*/

// gulp.task('compressIMG', function() {
// 	return gulp 
// 		.src('./src/client/images/*.*')
// 		.pipe(compressImg({optimizationLevel: 4}))
// 		.pipe(gulp.dest('./build/images'));
// })


// /*=====================DELETING FOLDERS===================*/


// gulp.task('clean', function(done){
// 	clean('./build/', done);
// });



// /*=====================OPTIMIZING CSS && JS [Combining ALL CSS AND JS]================*/


// gulp.task('concat', function () {
//     return gulp.src('./src/*.html')
//         .pipe(useref())
//         .pipe(gulpif('*.js', uglify()))
//         .pipe(gulpif('*.css', minifyCss()))
//         .pipe(gulp.dest('./src/client/app/'));
// })

