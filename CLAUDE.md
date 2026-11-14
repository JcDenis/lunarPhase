# lunarPhase

Notes for AI assistants working on the Dotclear plugin lunarPhase.

**Read first** the shared conventions of the author's Dotclear modules:
https://raw.githubusercontent.com/JcDenis/gh2da/master/CONVENTIONS.md
(if a web tool refuses the address, use `curl -s` on it from the shell).
The rules below take precedence for this module.

## Module

Show lunar phases on a widget.

No admin page. Public side: widgets, URL handlers.

Required Dotclear and PHP versions: see `_define.php`.

## Structure

* `src/Backend.php`: admin side: menu entry, favorites, behaviors registration.
* `src/Frontend.php`: public side: behaviors, template tags and URL handlers registration.
* `src/LunarPhase.php`: main class.
* `src/My.php`: module helpers (`My::id()`, settings, permissions).
* `src/Prepend.php`: loaded on every request: autoload, URL handlers, permission types.
* `src/Widgets.php`: widgets definition and rendering.
* URL handlers: `lunarphase`.
* Widgets: `lunarphase`.
* Behaviors used: `initWidgets`, `publicHeadContent`.

## Pitfalls

* None recorded yet: add here the traps met while working on the module.

## Testing

* Check the widgets (admin and public), the public URLs, in English and French.
* CI browses the common admin and public pages; extra pages can be listed in `.github/dotclear-test.txt`.
