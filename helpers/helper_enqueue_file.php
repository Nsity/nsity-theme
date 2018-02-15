<?php

	class NSHelperEnqueueFile {
		private function getVersionFile($file)
		{
			$version = "";
			if ($file)
				$version = filemtime($file);
			return $version;
		}

		function registrateScript($handle, $src, $deps = array(), $file = false, $in_footer = false)
		{
			$ver = $this->getVersionFile($file);
			wp_register_script($handle, $src, $deps, $ver, $in_footer);
		}

		function registrateStyle($handle, $src, $deps = array(), $file = false, $media = "all")
		{
			$ver = $this->getVersionFile($file);
			wp_register_style($handle, $src, $deps, $ver, $media);
		}
	}
