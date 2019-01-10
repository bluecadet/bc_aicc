[![Codacy Badge](https://api.codacy.com/project/badge/Grade/02ad1c27f5a141a98d7d0a1508bf081d)](https://www.codacy.com/app/pingevt/bc_aicc?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=bluecadet/bc_aicc&amp;utm_campaign=Badge_Grade)

# Bluecadet Auto Import Content Config

**GOAL:** Reduce 90% drudgery and Time consumption.

## Field type coverage

| Field Type | Status |
| --- | --- |
| Text {string} | Y |
| Entity Reference Revision | |
| &nbsp;Paragraph | Y |
| Entity Reference | |
| &nbsp;Node | N |
| &nbsp;Taxonomy Term | N |
| &nbsp;Media | N |
| Text (formatted) | N |
| Text (formatted, long) | N |
| Link | N |
| Date | N |
| Bool | N |
| Number (decimal) | N |
| Number (float) | N |
| Number (int) | N |
| Date Recur | N |

## Assumptions

-  Assumes paragraph entities have a "Preview" display mode.
-  Assumes media entities have a "Inline Entity Form" form mode.
-  Assumes the following entity browsers
  -  image_media_browser
  -  video_media_browser
