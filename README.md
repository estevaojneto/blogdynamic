<img src="https://github.com/estevaojneto/blogdynamic/blob/main/screenshot.png"/>

A theme originally used in https://0395.ch.

## Requirements
- A WordPress v6.x installation (theme compatibility with WP 5.x is theoretically possible but untested);
- A web server running PHP 8.0 and MySQL;
- NPM to run "npm run build";
- Inspiration for writing!

## Nice-to-haves
- Classic Editor plugin. At least for now, for the purposes of this theme, Gutenberg is just an unnecessary overhead;

## How to Set Up
- Install the Theme however you want; you can just download a zip copy of this repository and upload it to your site if you want, or you can `git clone` this to your server theme folder (recommended);
- Go to the frontend/ folder of the theme, copy .env.example to a new file named .env; where it says PUBLIC_URL, change the constant name to the theme URI in your site;
- Run `npm run build` so React can generate its files accordingly;
- Set a privacy policy, as most countries actually require your site to have one;
- All set! All your posts will be there.

## Credits
For forks, I ask you to please keep these credits and just add your name to them. :)

- Estevão Neto - https://github.com/estevaojneto - Original theme concept and implementation
- Alan Viotto - https://github.com/AlanViotto - Original theme fancy preview image


## Some Technical Questions

### Does this support headless WP (SHORTINIT)?
It might if you can get a headless WP with a Rest API setup that allows the theme to return posts (I have seen and worked with such schemes in the past), but this is untested. I don't use it that way, personally and haven't looked too deep into it as the only thing preventing me from adding a SHORTINIT definition is that I find the WordPress admin area, used in conjunction with Classic Editor, a pretty nifty way of adding posts. Additionaly, on the one attempt I did of trying to run like that, I got an error on the WP side of the code (not related to the theme); might be an environment issue, but I haven't looked further.

### Can I use the frontend without WordPress?
Sure! As long as the backend you set up is able to communicate via REST in the data format expected by the frontend, you can actually use anything. :)

### Why use React in the entire frontend?
See the answer above.
In the future, having the frontend completely detached from the backend (WordPress) will allow me to ditch WP if I even want to do so. This does means we need some workarounds (e.g for pagetitles), but this is one option I would like to keep open.

