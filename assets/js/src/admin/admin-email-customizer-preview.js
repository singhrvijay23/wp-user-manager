/* global wp, jQuery, console, wpumCustomizePreview, sanitizeHtml */
/* eslint consistent-this: [ "error", "control" ] */
/* eslint no-magic-numbers: ["error", { "ignore": [0,1] }] */
/* eslint complexity: ["error", 8] */
(function (wp, $) {
	'use strict'
	const registeredEmails = wpumCustomizePreview

	/**
	 * Register the update for the title field for each available email.
	 */
	$.map(registeredEmails.emails, function (email, id) {
		wp.customize('wpum_email[' + id + '][title]', function (value) {
			value.bind(function (newval) {
				$('h1').text(newval)
			})
		})
		wp.customize('wpum_email[' + id + '][footer]', function (value) {
			value.bind(function (newval) {
				$('table.email-footer td.content-cell p').html(sanitizeHtml(newval))
			})
		})
		wp.customize('wpum_email[' + id + '][content]', function (value) {
			value.bind(function (newval) {
				$('table.email-body_inner td.content-cell h1 ~ p').html(sanitizeHtml(newval))
			})
		})
	})
})(window.wp, jQuery)
