import fs from 'fs';
import imagemin from 'imagemin';
import imageminMozjpeg from 'imagemin-mozjpeg';
import imageminPngquant from 'imagemin-pngquant';
import imageminWebp from 'imagemin-webp';

const publicDir = 'public';

// Helper function to get all subdirectories inside a folder
const getDirectories = (source) =>
  fs.readdirSync(source, { withFileTypes: true })
    .filter(dirent => dirent.isDirectory())
    .map(dirent => dirent.name);

(async () => {
    // 1. Get all folders inside the public directory
    const folders = getDirectories(publicDir);

    // 2. Loop through each folder one by one
    for (const folder of folders) {
        // Skip non-image directories to save processing time
        const ignoredFolders = ['css', 'js', 'fonts', 'vendor', 'inc', 'jquery', 'styles', 'ckeditor'];
        if (ignoredFolders.includes(folder)) continue;

        const targetFolder = `${publicDir}/${folder}`;
        console.log(`Optimizing images in: ${targetFolder}...`);

        // Compress JPG and PNG in-place
        await imagemin([`${targetFolder}/**/*.{jpg,jpeg,png}`], {
            destination: targetFolder,
            plugins: [
                imageminMozjpeg({ quality: 80 }),
                imageminPngquant({ quality: [0.65, 0.8] })
            ]
        });

        // Generate modern .webp versions inside a 'webp' subfolder for each directory
        await imagemin([`${targetFolder}/**/*.{jpg,png}`], {
            destination: `${targetFolder}/webp`,
            plugins: [
                imageminWebp({ quality: 80 })
            ]
        });
    }

    console.log('✅ All images optimized successfully while keeping the folder structure intact!');
})();