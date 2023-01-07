import * as baseConstants from './baseConstants'

export const ENDPOINT_BASE = "/blogdynamic/v1/"
export const SITEMETA_ENDPOINT = baseConstants.REST_URL+ENDPOINT_BASE+"site/"
export const POST_ENDPOINT = baseConstants.REST_URL+ENDPOINT_BASE+"post/"
export const POST_BY_SLUG_ENDPOINT = baseConstants.REST_URL+ENDPOINT_BASE+"post/?slug="