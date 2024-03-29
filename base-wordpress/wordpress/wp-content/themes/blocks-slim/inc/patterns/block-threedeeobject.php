{{!--
	Static block that creates a canvas for a 3D element to be loaded.
	Right now, pulling everything in here, will adjust per-CMS as dev continues.
	Height issue. The text vs 3D need some "manual" balance but that's not unusual for media.
--}}
<section id="tob3d__threedee__number" class="{{classConcat name classNames='main'}}">
	{{!-- Add wrapper and title --}}
	<div id="tob3d__threedee__canvas" class="{{classConcat name classNames='canvas'}}">
		<div id="tob3d__threedee__gizmo" class="{{classConcat name classNames='gizmo__orbit'}}"></div>
	</div>
	{{!-- Add link to post a the bottom. (Backend of this will take more time.) --}}
	<div class="tob3d__explaination">
		<h2>
			{{selectContent models 0 'explainationTitle'}}
		</h2>
		<p>
			{{selectContent models 0 'explainationBody'}}
		</p>
		{{#> blocks/block-postpreview-onpage }}
		{{/blocks/block-postpreview-onpage}}
	</div>
</section>
{{!-- Create for later. --}}
<script type="module">
	import * as THREE 			from './assets/js/tob3d-three-three.module.js';
	import { APP }				from './assets/js/tob3d-three-app.js';
	import { VRButton }			from './assets/js/tob3d-three-VRButton.js';
	window.THREE = THREE; // Used by APP Scripts.
	window.VRButton = VRButton; // Used by APP Scripts.
	const loader = new THREE.FileLoader();
	loader.load( './tob3d-three-app.json', function ( text ) {
		const $threedeeContainer = document.getElementById('tob3d__threedee__canvas')
		console.log($threedeeContainer.innerWidth)
		const player = new APP.Player();
		player.load( JSON.parse( text ) );
		player.setSize( $threedeeContainer.offsetWidth, $threedeeContainer.offsetHeight )
		player.play();
		document.getElementById('tob3d__threedee__number').appendChild( player.dom )
		window.addEventListener( 'resize', function () {
			player.setSize( $threedeeContainer.offsetWidth, $threedeeContainer.offsetHeight )
		} );
	} );
</script>